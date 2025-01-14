<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * Map the Excel row to the User model.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Ensure row contains required keys
        if (!$this->hasRequiredKeys($row)) {
            Log::error('Import Error: Missing required keys in row: ' . json_encode($row));
            return null; // Skip the row
        }

        // Clean the phone number
        $cleanedPhoneNumber = preg_replace('/\D/', '', $row['phone_number']);

        // Validate the cleaned data
        if ($this->isValid($row, $cleanedPhoneNumber)) {
            return new User([
                'name'   => $row['name'],
                'type'   => $row['type'],
                'mobile' => substr($cleanedPhoneNumber, 0, 15), // Truncate to fit DB column
                // 'score'   => $row['score'],
            ]);
        }

        // Log invalid rows
        Log::error('Import Error: Invalid row: ' . json_encode($row));
        return null; // Skip invalid rows
    }

    /**
     * Validate the row data.
     *
     * @param array $row
     * @param string $cleanedPhoneNumber
     * @return bool
     */
    private function isValid(array $row, string $cleanedPhoneNumber): bool
    {
        return isset($row['name']) &&
            is_string($row['name']) &&
            $this->isValidPhoneNumber($cleanedPhoneNumber);
    }

    /**
     * Check if the row has all required keys.
     *
     * @param array $row
     * @return bool
     */
    private function hasRequiredKeys(array $row): bool
    {
        return isset($row['type'],$row['name'], $row['phone_number'],);
    }

    /**
     * Validate the phone number.
     *
     * @param string $phoneNumber
     * @return bool
     */
    private function isValidPhoneNumber(string $phoneNumber): bool
    {
        return strlen($phoneNumber) >= 10 && strlen($phoneNumber) <= 15;
    }
}
