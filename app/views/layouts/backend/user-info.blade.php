<!-- User info -->
<div class="login-info">
    <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
        
        <a href="backend#backend/my-profile">
            <img src="{{ Auth::user()->picture; }}" alt="me" class="online" /> 
            <span>
                {{ Auth::user()->username; }}
            </span>
        </a>
        
    </span>
</div>
<!-- end user info -->