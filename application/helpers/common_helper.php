<?php

function isUserLogin()
{
    if (isset($_SESSION['admin_id']))
        return true;
    else
        redirect('admin/Login');
}



function isPanelUserLogin()
{
    if (isset($_SESSION['admin_id']))
        return true;
    else
        redirect(base_url(''));
}


function isWebUserLogin()
{
    if (isset($_SESSION['id']))
        return true;
    else
        redirect(base_url(''));
}

