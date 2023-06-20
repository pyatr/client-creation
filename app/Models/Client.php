<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    //To avoid Unknown column 'updated_at' error
    public $timestamps = false;

    protected $fillable = [
        self::firstName,
        self::lastName,
        self::email,
        self::companyName,
        self::position,
        self::phone_number_1,
        self::phone_number_2,
        self::phone_number_3
    ];

    protected const firstName = 'first_name';
    protected const lastName = 'last_name';
    protected const email = 'email';
    protected const companyName = 'company_name';
    protected const position = 'position';
    protected const phone_number_1 = 'phone_number_1';
    protected const phone_number_2 = 'phone_number_2';
    protected const phone_number_3 = 'phone_number_3';

    public static function createNewClient(string      $firstName,
                                           string      $lastName,
                                           string      $email,
                                           string|null $companyName = '',
                                           string|null $position = '',
                                           string|null $firstPhoneNumber = '',
                                           string|null $secondPhoneNumber = '',
                                           string|null $thirdPhoneNumber = ''): string
    {
        if (!self::doesClientExist($email)) {
            Client::create([
                self::firstName => $firstName,
                self::lastName => $lastName,
                self::email => $email,
                self::companyName => $companyName,
                self::position => $position,
                self::phone_number_1 => $firstPhoneNumber,
                self::phone_number_2 => $secondPhoneNumber,
                self::phone_number_3 => $thirdPhoneNumber]);
            return "created";
        }
        return "exists";
    }

    public static function getClients(int $page, int $pageSize): array
    {
        $offset = $pageSize * ($page - 1);
        return Client::take($pageSize)->offset($offset)->get()->toArray();
    }

    public static function doesClientExist(string $email)
    {
        return Client::where(self::email, '=', $email)->count() > 0;
    }

    public static function getClientCount(): int
    {
        return Client::get()->count();
    }

    public static function deleteClient(string $email): bool|null
    {
        return Client::where(self::email, '=', $email)->delete();
    }

    public static function getSpecificClient(string $email): array
    {
        return Client::where(self::email, '=', $email)->get()->toArray();
    }

    public static function updateClient(string      $firstName,
                                        string      $lastName,
                                        string      $oldEmail,
                                        string      $email,
                                        string|null $companyName = '',
                                        string|null $position = '',
                                        string|null $firstPhoneNumber = '',
                                        string|null $secondPhoneNumber = '',
                                        string|null $thirdPhoneNumber = ''): string
    {
        $clientExists = Client::where(self::email, '=', $email)->count() > 0;
        if ($clientExists && $oldEmail != $email) {
            return 'email-used';
        }
        if (Client::where(self::email, '=', $oldEmail)->update([
            self::firstName => $firstName,
            self::lastName => $lastName,
            self::email => $email,
            self::companyName => $companyName,
            self::position => $position,
            self::phone_number_1 => $firstPhoneNumber,
            self::phone_number_2 => $secondPhoneNumber,
            self::phone_number_3 => $thirdPhoneNumber])) {
            return 'updated';
        }
        return 'unknown';
    }
}
