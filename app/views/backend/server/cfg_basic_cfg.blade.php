language                    = "{{ $server->server_basic_cfg->language }}";

adapter                     = {{ $server->server_basic_cfg->adapter }};

3D_Performance              = {{ $server->server_basic_cfg->performance_3d }};

Resolution_W                = {{ $server->server_basic_cfg->resolution_w }};

Resolution_H                = {{ $server->server_basic_cfg->resolution_h }};

Resolution_Bpp              = {{ $server->server_basic_cfg->resolution_bpp }};

Windowed                    = {{ $server->server_basic_cfg->windowed }};

MinBandwidth                = {{ $server->server_basic_cfg->min_bandwidth }};

MaxBandwidth                = {{ $server->server_basic_cfg->max_bandwidth }};

MaxMsgSend                  = {{ $server->server_basic_cfg->max_msg_send }};

MaxSizeGuaranteed           = {{ $server->server_basic_cfg->max_size_guaranteed }};

MaxSizeNonguaranteed        = {{ $server->server_basic_cfg->max_size_non_guaranteed }};

MinErrorToSendNear          = {{ $server->server_basic_cfg->min_error_to_send_near }};

MinErrorToSend              = {{ $server->server_basic_cfg->min_error_to_send }};

MaxCustomFileSize           = {{ $server->server_basic_cfg->max_custom_file_size }};

serverLongitude             = {{ $server->server_basic_cfg->server_longitude }};

serverLatitude              = {{ $server->server_basic_cfg->server_latitude }};

serverLongitudeAuto         = {{ $server->server_basic_cfg->server_longitude_auto }};

serverLatitudeAuto          = {{ $server->server_basic_cfg->server_latitude_auto }};