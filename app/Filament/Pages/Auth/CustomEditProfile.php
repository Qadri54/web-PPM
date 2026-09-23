<?php

namespace App\Filament\Pages\Auth;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;

class CustomEditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Profil')
                    ->description("Perbarui informasi profil akun dan alamat email Anda.")
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                    ]),
                    
                Section::make('Ubah Kata Sandi')
                    ->description('Pastikan akun Anda menggunakan kata sandi acak yang panjang agar tetap aman.')
                    ->schema([
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ]),
            ]);
    }
}
