<div>Solution checker active</div>
<?php
if ( ($solution = @$_REQUEST['solution']) && (@$_REQUEST['button_submit']) )
{
    echo "FAIL!";
}
