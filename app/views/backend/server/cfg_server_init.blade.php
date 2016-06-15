#!/bin/bash

### BEGIN INIT INFO
# Provides:             {{ $server->name }}
# Required-Start:       $local_fs $remote_fs $network
# Required-Stop:        $local_fs $remote_fs $network
# Default-Start:        2 3 4 5
# Default-Stop:         0 1 6
# Short-Description:    {{ $server->hostname }}
# Description:          {{ $server->hostname }}
### END INIT INFO

set -e
PATH=${PATH}:/data/arma3
NAME={{ $server->name }}
PIDFILE=/data/arma3/instances/{{ $server->name }}/server.pid
DAEMON="/data/arma3/arma3server"
DAEMON_OPTS="-enableHT -exThreads={{ $server->ex_threads }} -maxMem={{ $server->memory }} -server -noSplash -noSound -noBenchmark -noPause -loadMissionToMemory -name=arma3 -profiles=/data/arma3/instances/{{ $server->name }}/profile -pid=/data/arma3/instances/{{ $server->name }}/server.pid -config=/data/arma3/instances/{{ $server->name }}/server.cfg -cfg=/data/arma3/instances/{{ $server->name }}/basic.cfg -par=/data/arma3/instances/{{ $server->name }}/parameters.cfg -ranking=/data/arma3/instances/{{ $server->name }}/logs/ranking.log -bepath=/data/arma3/instances/{{ $server->name }}/battleye -port={{ $server->port }}2"
USER=gameserver
GROUP=gameserver
APPDIR=/data/arma3

LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/data/arma3:/home/gameserver/.steam/steam/linux32
export LD_LIBRARY_PATH

ulimit -n 102400

test -x $DAEMON || exit 0

. /lib/lsb/init-functions

case "$1" in
    start)
        log_daemon_msg "Starting"
        log_progress_msg $NAME
        if ! start-stop-daemon --start --chdir $APPDIR --quiet --chuid $USER:$GROUP --make-pidfile --pidfile $PIDFILE --background --startas /bin/bash -- -c "exec $DAEMON $DAEMON_OPTS 1>/data/arma3/instances/{{ $server->name }}/logs/server.log 2>/data/arma3/instances/{{ $server->name }}/logs/error.log"; then
            log_end_msg 1
            exit 1
        fi
        log_end_msg 0
    ;;
    stop)
        log_daemon_msg "Stopping"
        log_progress_msg $NAME
        if ! start-stop-daemon --stop --chdir $APPDIR --quiet --chuid $USER:$GROUP --oknodo --pidfile $PIDFILE; then
            log_end_msg 1
            exit 1
        fi
        TIMESTAMP=$(date +%Y-%m-%d-%H-%M-%S)
        PID=$(cat $PIDFILE)
        if [ -f /data/arma3/instances/{{ $server->name }}/logs/server.log ]; then
            mv /data/arma3/instances/{{ $server->name }}/logs/server.log "/data/arma3/instances/{{ $server->name }}/logs/$TIMESTAMP-server.log"
        fi
        if [ -f /data/arma3/instances/{{ $server->name }}/logs/error.log ]; then
            mv /data/arma3/instances/{{ $server->name }}/logs/error.log "/data/arma3/instances/{{ $server->name }}/logs/$TIMESTAMP-error.log"
        fi
        if [ -f /data/arma3/instances/{{ $server->name }}/logs/console_$PID.log ]; then
            mv /data/arma3/instances/{{ $server->name }}/logs/console_$PID.log "/data/arma3/instances/{{ $server->name }}/logs/$TIMESTAMP-console.log"
        fi
        if [ -f /data/arma3/instances/{{ $server->name }}/logs/mpStatistics_$PID.log ]; then
            mv /data/arma3/instances/{{ $server->name }}/logs/mpStatistics_$PID.log "/data/arma3/instances/{{ $server->name }}/logs/$TIMESTAMP-mp-statistics.log"
        fi
        rm -rf $PIDFILE
        log_end_msg 0
    ;;
    restart)
        $0 stop
        sleep 1
        $0 start
    ;;
    status)
        status="0"
        status_of_proc -p $PIDFILE $DAEMON $NAME || status=$?
        exit $status
    ;;
    *)
        echo "Usage: $0 {start|stop|restart|status}"
        exit 1
    ;;
esac
exit 0
