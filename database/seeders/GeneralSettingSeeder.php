<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyName = new GeneralSetting();
        $companyName->category = "general";
        $companyName->key = "company_name";
        $companyName->value = "Èter Edicions";
        $companyName->save();

        $companyLogo = new GeneralSetting();
        $companyLogo->category = "general";
        $companyLogo->key = "logo";
        $companyLogo->value = "logo.webp";
        $companyLogo->save();

        $generalEmail = new GeneralSetting();
        $generalEmail->category = "contact";
        $generalEmail->key = "general_email";
        $generalEmail->value = "orissech@eteredicions.com";
        $generalEmail->save();

        $foreignRightsEmail = new GeneralSetting();
        $foreignRightsEmail->category = "contact";
        $foreignRightsEmail->key = "foreign_rights_email";
        $foreignRightsEmail->value = "orissech@eteredicions.com";
        $foreignRightsEmail->save();

        $companyLegalName = new GeneralSetting();
        $companyLegalName->category = "legal_info";
        $companyLegalName->key = "legal_name";
        $companyLegalName->value = "Serveis Editorials Èter S.L.";
        $companyLegalName->save();

        $companyAddress1 = new GeneralSetting();
        $companyAddress1->category = "legal_info";
        $companyAddress1->key = "address_1";
        $companyAddress1->value = "Sant Gil 16, 3-1";
        $companyAddress1->save();

        $companyAddress2 = new GeneralSetting();
        $companyAddress2->category = "legal_info";
        $companyAddress2->key = "address_2";
        $companyAddress2->value = "08001, Barcelona";
        $companyAddress2->save();


        $companyFacebook = new GeneralSetting();
        $companyFacebook->category = 'social_networks';
        $companyFacebook->key = "facebook";
        $companyFacebook->value = "https://www.facebook.com/people/%C3%88ter-Edicions-%D8%AF%D8%A7%D8%B1-%D8%A7%D9%84%D8%A3%D8%AB%D9%8A%D8%B1/100089381536837";
        $companyFacebook->save();

        $companyInstagram = new GeneralSetting();
        $companyInstagram->category = 'social_networks';
        $companyInstagram->key = "instagram";
        $companyInstagram->value = "https://www.instagram.com/eteredicions/";
        $companyInstagram->save();

        $companyTwitter = new GeneralSetting();
        $companyTwitter->category = 'social_networks';
        $companyTwitter->key = "twitter";
        $companyTwitter->value = "https://twitter.com/eteredicions";
        $companyTwitter->save();

        $pageTitle = new GeneralSetting();
        $pageTitle->category = 'page';
        $pageTitle->key = "title";
        $pageTitle->value = "Èter Edicions";
        $pageTitle->save();
    }
}
