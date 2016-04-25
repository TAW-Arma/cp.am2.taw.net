<!-- User info -->
<div class="login-info">
    <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
        
        <a href="javascript:void(0);">
            <img src="//www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))); }}" alt="me" class="online" /> 
            <span>
                {{ Auth::user()->username; }}
            </span>
        </a>
        
    </span>
</div>
<!-- end user info -->