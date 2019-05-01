<section id="login">
            <form id="loginForm" name="loginForm">
                <input class = "input-lg" id="timer_subject" value="" name="timer_subject" type="text" placeholder="Enter timer subject here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter timer subject here !'">
            </form>
<div id="clock" class="light">
    <div class="display">
        <div class="weekdays"></div>
        <div class="ampm"></div>
        <div class="alarm"></div>
        <div class="digits"></div>
    </div>
</div>
    
<div class="button-holder">
    <a id="switch-theme" class="button">Switch Theme</a>
    <a class="alarm-button"></a>
</div>
    
<!-- The dialog is hidden with css -->
<div class="overlay">
    
    <div id="alarm-dialog">
        
        <h2>Set alarm after</h2>
            
        <label class="hours">
            Hours
            <input type="number" value="0" min="0" />
        </label>
            
        <label class="minutes">
            Minutes
            <input type="number" value="0" min="0" />
        </label>
            
        <label class="seconds">
            Seconds
            <input type="number" value="0" min="0" />
        </label>
            
        <div class="button-holder">
            <a id="alarm-set" class="button blue">Set</a>
            <a id="alarm-clear" class="button red">Clear</a>
        </div>
            
        <a class="close"></a>
            
    </div>
        
</div>
    
<div class="overlay">
    
    <div id="time-is-up">
        
        <h2 id="timer_alert"></h2>
            
        <div class="button-holder">
            <a class="button blue">Close</a>
        </div>
            
    </div>
        
</div>
    
<audio id="alarm-ring" preload>
    <source src="alarm_assets/audio/ticktac.mp3" type="audio/mpeg" />
    <source src="alarm_assets/audio/ticktac.ogg" type="audio/ogg" />
</audio>