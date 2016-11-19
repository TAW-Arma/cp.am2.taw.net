            <!-- NAVIGATION : This navigation is also responsive-->
            <nav>
                <ul>
                    @if (Auth::user()->can('see_dashboard'))
                        <li class="active">
                            <a href="backend/dashboard" title="{{ Lang::get('navigation.dashboard') }}"><i class="fa fa-lg fa-fw fa-dashboard"></i> <span class="menu-item-parent">{{ Lang::get('navigation.dashboard') }}</span></a>
                        </li>
                    @endif
                    @if (Auth::user()->can('see_server'))
                        <li>
                            <a href="backend/server" title="{{ Lang::get('navigation.server') }}"><i class="fa fa-lg fa-fw fa-server"></i> <span class="menu-item-parent">{{ Lang::get('navigation.server') }}</span></a>
                            <ul>
                                @if (Auth::user()->can('see_server'))
                                    <li>
                                        <a href="backend/server" title="{{ Lang::get('navigation.server_overview') }}"><i class="fa fa-lg fa-fw fa-server"></i> <span class="menu-item-parent">{{ Lang::get('navigation.server_overview') }}</span></a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('mission_server'))
                                    <li>
                                        <a href="backend/server/missions" title="{{ Lang::get('navigation.server_missions') }}"><i class="fa fa-lg fa-fw fa-folder-open-o"></i> <span class="menu-item-parent">{{ Lang::get('navigation.server_missions') }}</span></a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('bans_server'))
                                    <li>
                                        <a href="backend/server/bans" title="{{ Lang::get('navigation.server_bans') }}"><i class="fa fa-lg fa-fw fa-minus-circle"></i> <span class="menu-item-parent">{{ Lang::get('navigation.server_bans') }}</span></a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->can('see_squad'))
                        <li>
                            <a href="backend/squad" title="{{ Lang::get('navigation.squad') }}"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">{{ Lang::get('navigation.squad') }}</span></a>
                        </li>
                    @endif
                    @if (Auth::user()->can('see_security'))
                        <li>
                            <a href="backend/security/user" title="{{ Lang::get('navigation.security') }}"><i class="fa fa-lg fa-fw fa-shield"></i> <span class="menu-item-parent">{{ Lang::get('navigation.security') }}</span></a>
                            <ul>
                                @if (Auth::user()->can('see_user'))
                                    <li>
                                        <a href="backend/security/user" title="{{ Lang::get('navigation.security_users') }}"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">{{ Lang::get('navigation.security_users') }}</span></a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('see_role'))
                                <li>
                                    <a href="backend/security/role" title="{{ Lang::get('navigation.security_roles') }}"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">{{ Lang::get('navigation.security_roles') }}</span></a>
                                </li>
                                @endif
                                @if (Auth::user()->can('see_permission'))
                                <li>
                                    <a href="backend/security/permission" title="{{ Lang::get('navigation.security_permissions') }}"><i class="fa fa-lg fa-fw fa-key"></i> <span class="menu-item-parent">{{ Lang::get('navigation.security_permissions') }}</span></a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    @endif
					@if (Auth::user()->can('see_administration'))
                        <li class="active">
                            <a href="backend/administration" title="{{ Lang::get('navigation.adminisration') }}"><i class="fa fa-id-card"></i> <span class="menu-item-parent">{{ Lang::get('navigation.administration') }}</span></a>
                        </li>
                    @endif
                </ul>
            </nav>
            <span class="minifyme" data-action="minifyMenu"> 
                <i class="fa fa-arrow-circle-left hit"></i> 
            </span>
        </aside>
        <!-- END NAVIGATION -->