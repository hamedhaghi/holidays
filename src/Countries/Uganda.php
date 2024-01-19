<?php
/**
 * Date 19-Jan-2024
 *
 * @author   Joel Crawford  Email: <joelcrawford30@gmail.com> Github: <https://github.com/Crawford30> LinkedIn: <https://www.linkedin.com/in/Crawford30>
 */

namespace Spatie\Holidays\Countries;

use Carbon\CarbonImmutable;

class Uganda extends Country
{

    public function countryCode(): string
    {
        return 'ug';
    }

    /**
     * @inheritDoc
     */
    protected function allHolidays(int $year): array
    {

    /**
    * 'New Year' => '01-01', Format:: Month-Date
    */
        return array_merge([
            "New Year's  Day" => "01-01",
            "NRM Liberation Day" => "01-26",
            "Archbishop Janani Luwum Day" => "02-16",
            "International Women's Day" => "03-08",
            "Labour Day" => "05-01",
            "Martyrs' Day" => "06-03",
            "National Hereos Day" => "06-09",
            "Independence Day" => "10-09",
            "Christmas Day" => "12-25",
            "Boxing Day" => "12-26",
        ], $this->variableHolidays($year));
    }

    /**
     * @param int $year
     *
     * @return array<string, CarbonImmutable>
     */
    private function variableHolidays(int $year): array
    {
        $easter = CarbonImmutable::createFromTimestamp(easter_date($year))->setTimezone('Africa/Nairobi');
        return [
            "Good Friday" => $easter->subDays(2),
            "Easter Monday" => $easter->addDay(),
        ];
    }
}
