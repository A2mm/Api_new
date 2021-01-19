<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        $countries = array(
            array('iso' => 'AF', 'name' => 'AFGHANISTAN','nicename' => 'Afghanistan','iso3' => 'AFG','numcode' => '4','phonecode' => '+93'),
           
            array('iso' => 'DZ','name' => 'ALGERIA','nicename' => 'Algeria','iso3' => 'DZA','numcode' => '12','phonecode' => '+213'),
            
        
            array('iso' => 'BH','name' => 'BAHRAIN','nicename' => 'Bahrain','iso3' => 'BHR','numcode' => '48','phonecode' => '+973'),

           
            array('iso' => 'BE','name' => 'BELGIUM','nicename' => 'Belgium','iso3' => 'BEL','numcode' => '56','phonecode' => '+32'),
           
            array('iso' => 'BR','name' => 'BRAZIL','nicename' => 'Brazil','iso3' => 'BRA','numcode' => '76','phonecode' => '+55'),

          
            array('iso' => 'CA','name' => 'CANADA','nicename' => 'Canada','iso3' => 'CAN','numcode' => '124','phonecode' => '+1'),

        
            array('iso' => 'CN','name' => 'CHINA','nicename' => 'China','iso3' => 'CHN','numcode' => '156','phonecode' => '+86'),

           

            array('iso' => 'CO','name' => 'COLOMBIA','nicename' => 'Colombia','iso3' => 'COL','numcode' => '170','phonecode' => '+57'),

           
            array('iso' => 'CG','name' => 'CONGO','nicename' => 'Congo','iso3' => 'COG','numcode' => '178','phonecode' => '+242'),

        
            array('iso' => 'CR','name' => 'COSTA RICA','nicename' => 'Costa Rica','iso3' => 'CRI','numcode' => '188','phonecode' => '+506'),


            array('iso' => 'HR','name' => 'CROATIA','nicename' => 'Croatia','iso3' => 'HRV','numcode' => '191','phonecode' => '+385'),


            array('iso' => 'DK','name' => 'DENMARK','nicename' => 'Denmark','iso3' => 'DNK','numcode' => '208','phonecode' => '+45'),
           
            array('iso' => 'EG','name' => 'EGYPT','nicename' => 'Egypt','iso3' => 'EGY','numcode' => '818','phonecode' => '+20'),

           

            array('iso' => 'ET','name' => 'ETHIOPIA','nicename' => 'Ethiopia','iso3' => 'ETH','numcode' => '231','phonecode' => '+251'),

          
            array('iso' => 'FR','name' => 'FRANCE','nicename' => 'France','iso3' => 'FRA','numcode' => '250','phonecode' => '+33'),

            array('iso' => 'DE','name' => 'GERMANY','nicename' => 'Germany','iso3' => 'DEU','numcode' => '276','phonecode' => '+49'),
          
            array('iso' => 'GH','name' => 'GHANA','nicename' => 'Ghana','iso3' => 'GHA','numcode' => '288','phonecode' => '+233'),
          

            array('iso' => 'IN','name' => 'INDIA','nicename' => 'India','iso3' => 'IND','numcode' => '356','phonecode' => '+91'),

            array('iso' => 'ID','name' => 'INDONESIA','nicename' => 'Indonesia','iso3' => 'IDN','numcode' => '360','phonecode' => '+62'),

            array('iso' => 'IR','name' => 'IRAN, ISLAMIC REPUBLIC OF','nicename' => 'Iran, Islamic Republic of','iso3' => 'IRN','numcode' => '364','phonecode' => '+98'),

            array('iso' => 'IQ','name' => 'IRAQ','nicename' => 'Iraq','iso3' => 'IRQ','numcode' => '368','phonecode' => '+964'),

            array('iso' => 'IE','name' => 'IRELAND','nicename' => 'Ireland','iso3' => 'IRL','numcode' => '372','phonecode' => '+353'),


            array('iso' => 'IT','name' => 'ITALY','nicename' => 'Italy','iso3' => 'ITA','numcode' => '380','phonecode' => '+39'),

           

            array('iso' => 'JP','name' => 'JAPAN','nicename' => 'Japan','iso3' => 'JPN','numcode' => '392','phonecode' => '+81'),
            array('iso' => 'JO','name' => 'JORDAN','nicename' => 'Jordan','iso3' => 'JOR','numcode' => '400','phonecode' => '+962'),
           
            array('iso' => 'KW','name' => 'KUWAIT','nicename' => 'Kuwait','iso3' => 'KWT','numcode' => '414','phonecode' => '+965'),
          

            array('iso' => 'LB','name' => 'LEBANON','nicename' => 'Lebanon','iso3' => 'LBN','numcode' => '422','phonecode' => '+961'),

           
            array('iso' => 'MY','name' => 'MALAYSIA','nicename' => 'Malaysia','iso3' => 'MYS','numcode' => '458','phonecode' => '+60'),
           
            array('iso' => 'MA','name' => 'MOROCCO','nicename' => 'Morocco','iso3' => 'MAR','numcode' => '504','phonecode' => '+212'),

            array('iso' => 'SA','name' => 'SAUDI ARABIA','nicename' => 'Saudi Arabia','iso3' => 'SAU','numcode' => '682','phonecode' => '+966'),

         
            array('iso' => 'ZA','name' => 'SOUTH AFRICA','nicename' => 'South Africa','iso3' => 'ZAF','numcode' => '710','phonecode' => '+27'),


            array('iso' => 'ES','name' => 'SPAIN','nicename' => 'Spain','iso3' => 'ESP','numcode' => '724','phonecode' => '+34'),
           
            array('iso' => 'SD','name' => 'SUDAN','nicename' => 'Sudan','iso3' => 'SDN','numcode' => '736','phonecode' => '+249'),

            array('iso' => 'TR','name' => 'TURKEY','nicename' => 'Turkey','iso3' => 'TUR','numcode' => '792','phonecode' => '+90'),

          
            array('iso' => 'UA','name' => 'UKRAINE','nicename' => 'Ukraine','iso3' => 'UKR','numcode' => '804','phonecode' => '+380'),

            array('iso' => 'AE','name' => 'UNITED ARAB EMIRATES','nicename' => 'United Arab Emirates','iso3' => 'ARE','numcode' => '784','phonecode' => '+971'),

            array('iso' => 'GB','name' => 'UNITED KINGDOM','nicename' => 'United Kingdom','iso3' => 'GBR','numcode' => '826','phonecode' => '+44'),

            array('iso' => 'US','name' => 'UNITED STATES','nicename' => 'United States','iso3' => 'USA','numcode' => '840','phonecode' => '+1'),

          );

          DB::table('countries')->insert($countries);
    }
}
