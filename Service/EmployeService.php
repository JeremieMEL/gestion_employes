<?php

class EmployeService
{
    public function logOut()
    {
        unset($_SESSION);
        unset($_COOKIE);
        session_destroy();
    }
}
