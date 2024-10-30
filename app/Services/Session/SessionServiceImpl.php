<?php

namespace App\Services\Session;

use Illuminate\Support\Facades\Crypt;
use App\Services\Session\SessionService;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;

class SessionServiceImpl implements SessionService
{
    private string $key = "s47qnsadub";

    private function getMain(): array
    {
        $encValue = session()->get($this->key);
        if ($encValue === null) {
            return [];
        }

        try {
            $decryptedValue = Crypt::decrypt($encValue);
            return json_decode($decryptedValue, true);
        } catch (DecryptException $e) {
            Log::error('SessionService (getMain-> error decrypt) : '. $e->getMessage());
            return [];
        }
    }
    public function save(string $key, string $value): void
    {
        $mainValue       = $this->getMain();
        $mainValue[$key] = $value;
        $encValue        = Crypt::encrypt($mainValue);
        session()->put($this->key, $encValue);
    }

    public function get(string $key): string
    {
        $mainValue = $this->getMain();
        return $mainValue[$key];
    }

    public function delete(string $key): void
    {
        $mainValue = $this->getMain();
        unset($mainValue[$key]);
    }
}
