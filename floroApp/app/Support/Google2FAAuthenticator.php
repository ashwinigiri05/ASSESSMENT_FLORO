<?php

namespace App\Support;
//use PragmaRX\Google2FALaravel\Support\Authenticator;
use Illuminate\Database\Eloquent\Model;

class Google2FAAuthenticator extends Model
{
    protected function canPassWithoutCheckingOTP()
    {dd('hghgf');
    if(!count($this->getUser()->passwordSecurity))
    return true;
    return
    !$this->getUser()->passwordSecurity->google2fa_enable ||
    !$this->isEnabled() ||
    $this->noUserIsAuthenticated() ||
    $this->twoFactorAuthStillValid();
    }
    protected function getGoogle2FASecretKey()
    {
    $secret = $this->getUser()->passwordSecurity->{$this->config('otp_secret_column')};
    if (is_null($secret) || empty($secret)) {
    throw new InvalidSecretKey('Secret key cannot be empty.');
    }
    return $secret;
    }
}
