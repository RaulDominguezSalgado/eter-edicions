<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageTranslation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->foreignrights();
        $this->about();
        $this->contact();
    }

    private function foreignrights(){
        $foreignrights = new Page();
        $foreignrights->tag = "foreign-rights";
        $foreignrights->save();

        $foreignrightsTranslationCa = new PageTranslation();
        $foreignrightsTranslationCa->page_id = $foreignrights->id;
        $foreignrightsTranslationCa->lang = "ca";
        $foreignrightsTranslationCa->slug = "foreign-rights";
        $foreignrightsTranslationCa->meta_title = "Foreign rights";
        $foreignrightsTranslationCa->meta_description = "Informació sobre els drets de traducció (foreign rights) de l'editorial Èter Edicions";
        $foreignrightsTranslationCa->save();

        $foreignrightsCaContentTitle = new PageContent();
        $foreignrightsCaContentTitle->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentTitle->key = "title";
        $foreignrightsCaContentTitle->content = "Foreign rights";
        $foreignrightsCaContentTitle->save();

        $foreignrightsCaContentP1 = new PageContent();
        $foreignrightsCaContentP1->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentP1->key = "p1";
        $foreignrightsCaContentP1->content = "Els nostres drets de traducció són gestionats Serveis Editorials Èter S.L.";
        $foreignrightsCaContentP1->save();

        $foreignrightsCaContentMoreInfo = new PageContent();
        $foreignrightsCaContentMoreInfo->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentMoreInfo->key = "more-info";
        $foreignrightsCaContentMoreInfo->content = "Per a més informació, si us plau contacteu amb:";
        $foreignrightsCaContentMoreInfo->save();

        $foreignrightsCaContentContactPerson = new PageContent();
        $foreignrightsCaContentContactPerson->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentContactPerson->key = "contact-person";
        $foreignrightsCaContentContactPerson->content = "Oriol Rissech";
        $foreignrightsCaContentContactPerson->save();

        $foreignrightsCaContentContactEmail = new PageContent();
        $foreignrightsCaContentContactEmail->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentContactEmail->key = "contact-email";
        $foreignrightsCaContentContactEmail->content = "orissech@eteredicions.com";
        $foreignrightsCaContentContactEmail->save();

        $foreignrightsCaContentAgency = new PageContent();
        $foreignrightsCaContentAgency->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentAgency->key = "agency";
        $foreignrightsCaContentAgency->content = "Serveis Editorials Èter S.L.";
        $foreignrightsCaContentAgency->save();

        $foreignrightsCaContentDownloadLabel = new PageContent();
        $foreignrightsCaContentDownloadLabel->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentDownloadLabel->key = "download-label";
        $foreignrightsCaContentDownloadLabel->content = "Catàleg de drets";
        $foreignrightsCaContentDownloadLabel->save();

        $foreignrightsCaContentDownloadFile = new PageContent();
        $foreignrightsCaContentDownloadFile->page_translation_id = $foreignrightsTranslationCa->id;
        $foreignrightsCaContentDownloadFile->key = "download-file";
        $foreignrightsCaContentDownloadFile->content = "foreign-rights-catalogue.pdf";
        $foreignrightsCaContentDownloadFile->save();


        $foreignrightsTranslationEn = new PageTranslation();
        $foreignrightsTranslationEn->page_id = $foreignrights->id;
        $foreignrightsTranslationEn->lang = "en";
        $foreignrightsTranslationEn->slug = "foreign-rights";
        $foreignrightsTranslationEn->meta_title = "Foreign rights";
        $foreignrightsTranslationEn->meta_description = "Info about the foreign rights of the book publishing house Èter Edicions";
        $foreignrightsTranslationEn->save();

        $foreignrightsEnContentTitle = new PageContent();
        $foreignrightsEnContentTitle->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentTitle->key = "title";
        $foreignrightsEnContentTitle->content = "Foreign rights";
        $foreignrightsEnContentTitle->save();

        $foreignrightsEnContentP1 = new PageContent();
        $foreignrightsEnContentP1->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentP1->key = "p1";
        $foreignrightsEnContentP1->content = "Our Foreign Rights are hold by  Serveis Editorials Èter S.L.";
        $foreignrightsEnContentP1->save();

        $foreignrightsEnContentMoreInfo = new PageContent();
        $foreignrightsEnContentMoreInfo->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentMoreInfo->key = "more-info";
        $foreignrightsEnContentMoreInfo->content = "For further information, please contact:";
        $foreignrightsEnContentMoreInfo->save();

        $foreignrightsEnContentContactPerson = new PageContent();
        $foreignrightsEnContentContactPerson->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentContactPerson->key = "contact-person";
        $foreignrightsEnContentContactPerson->content = "Oriol Rissech";
        $foreignrightsEnContentContactPerson->save();

        $foreignrightsEnContentContactEmail = new PageContent();
        $foreignrightsEnContentContactEmail->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentContactEmail->key = "contact-email";
        $foreignrightsEnContentContactEmail->content = "orissech@eteredicions.com";
        $foreignrightsEnContentContactEmail->save();

        $foreignrightsEnContentAgency = new PageContent();
        $foreignrightsEnContentAgency->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentAgency->key = "agency";
        $foreignrightsEnContentAgency->content = "Serveis Editorials Èter S.L.";
        $foreignrightsEnContentAgency->save();

        $foreignrightsEnContentDownloadLabel = new PageContent();
        $foreignrightsEnContentDownloadLabel->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentDownloadLabel->key = "download-label";
        $foreignrightsEnContentDownloadLabel->content = "Foreign Rights Catalogue ";
        $foreignrightsEnContentDownloadLabel->save();

        $foreignrightsEnContentDownloadFile = new PageContent();
        $foreignrightsEnContentDownloadFile->page_translation_id = $foreignrightsTranslationEn->id;
        $foreignrightsEnContentDownloadFile->key = "download-file";
        $foreignrightsEnContentDownloadFile->content = "foreign-rights-catalogue.pdf";
        $foreignrightsEnContentDownloadFile->save();
    }


    private function about(){
        $page = new Page();
        $page->tag = "about";
        $page->save();

        $pageTranslationCa = new PageTranslation();
        $pageTranslationCa->page_id = $page->id;
        $pageTranslationCa->lang = "ca";
        $pageTranslationCa->slug = "sobre-nosaltres";
        $pageTranslationCa->meta_title = "Sobre nosaltres";
        $pageTranslationCa->meta_description = "Informació sobre l'editorial Èter Edicions, especialitzada en traduccions de l'àrab al català i del català a l'àrab d’obres de poesia, pensament, novel·les i teatre";
        $pageTranslationCa->save();

        $pageCaContentH1 = new PageContent();
        $pageCaContentH1->page_translation_id = $pageTranslationCa->id;
        $pageCaContentH1->key = "h1";
        $pageCaContentH1->content = "Èter Edicions";
        $pageCaContentH1->save();

        $pageCaContentP1 = new PageContent();
        $pageCaContentP1->page_translation_id = $pageTranslationCa->id;
        $pageCaContentP1->key = "p1";
        $pageCaContentP1->content = <<<HEREDOC
        És una <strong>editorial</strong> radicada a <strong>Barcelona</strong> i fundada l'any 2023, nascuda amb la voluntat d'apropar les tradicions literàries en <strong>català i àrab</strong>. La nostra activitat es basa, doncs, a traduir publicacions contemporànies de cadascuna de les llengües a l'altra, així com de publicar textos inèdits en una i altra llengua.\nL'editorial apareix principalment per culpa d'en <strong>Mohammad Bitari</strong>. Aquest poeta, dramaturg i traductor palestí trobava a faltar accés a un món que coneix bé i que no arriba suficientment a l’altre costat del Mediterrani: la producció escrita en àrab. A pesar de l’enorme qualitat i varietat de les publicacions -siguin de poesia, teatre, novel·la o pensament-, les traduccions que ens arriben a Occident, i sobretot al català, són, o bé escasses, o bé no existeixen.\nPer resoldre això, va fundar Èter, conjuntament amb el poeta i crític literari <strong>Oriol Rissech</strong>.
        HEREDOC;;
        $pageCaContentP1->save();

        // $pageCaContentH2 = new PageContent();
        // $pageCaContentH2->page_translation_id = $pageTranslationCa->id;
        // $pageCaContentH2->key = "h2";
        // $pageCaContentH2->content = "Qui som?";
        // $pageCaContentH2->save();

        // $pageCaContentP2 = new PageContent();
        // $pageCaContentP2->page_translation_id = $pageTranslationCa->id;
        // $pageCaContentP2->key = "p2";
        // $pageCaContentP2->content = <<<HEREDOC
        // Èter Edicions apareix principalment per culpa d'en Mohammad Bitari. Aquest poeta, dramaturg i traductor palestí trobava a faltar accés a un món que coneix bé i que no arriba suficientment a l’altre costat del Mediterrani: la producció escrita en àrab. A pesar de l’enorme qualitat i varietat de les publicacions -siguin de poesia, teatre, novel·la o pensament-, les traduccions que ens arriben a Occident, i sobretot al català, són, o bé escasses, o bé no existeixen.
        // Per resoldre això, va fundar Èter, conjuntament amb el poeta i crític literari Oriol Rissech.
        // HEREDOC;
        // $pageCaContentP2->save();

        // $pageCaContentH3 = new PageContent();
        // $pageCaContentH3->page_translation_id = $pageTranslationCa->id;
        // $pageCaContentH3->key = "h3";
        // $pageCaContentH3->content = "Per què aquest nom?";
        // $pageCaContentH3->save();

        // $pageCaContentP3 = new PageContent();
        // $pageCaContentP3->page_translation_id = $pageTranslationCa->id;
        // $pageCaContentP3->key = "p3";
        // $pageCaContentP3->content = <<<HEREDOC
        // En la física medieval, l’èter era considerat el cinquè element, l’element que es trobava en l’espai: o sigui, allò que mantenia unit el conjunt universal.
        // Fins al final del segle XIX, l’èter com a substància hipotètica es feia servir per a explicar la transmissió de la llum o la pròpia força de la gravetat (Newton dixit, com a mínim en un primer esbós dels seus principis).
        // Tot i que l’experiment de Michelson i Morley, de 1887, va concloure la no existència de l’èter, i Einstein va acabar de rematar-lo amb la Teoria de la Relativitat, es va considerar que l’èter com a símbol era més que suggestiu: la proposta editorial estaria ben representada per la substància que connecta els cossos terrestres, per la substància que uneix els cossos terrestres.
        // I és això el que volem ser: una editorial que creï ponts, que obri camins d’intercanvi i de creació entre les dues llengües.
        // HEREDOC;
        // $pageCaContentP3->save();

        // $pageCaContentH4 = new PageContent();
        // $pageCaContentH4->page_translation_id = $pageTranslationCa->id;
        // $pageCaContentH4->key = "h4";
        // $pageCaContentH4->content = "";
        // $pageCaContentH4->save();

        // $pageCaContentP4 = new PageContent();
        // $pageCaContentP4->page_translation_id = $pageTranslationCa->id;
        // $pageCaContentP4->key = "p4";
        // $pageCaContentP4->content = <<<HEREDOC

        // HEREDOC;
        // $pageCaContentP4->save();

    }

    private function contact(){
        $page = new Page();
        $page->tag = "contact";
        $page->save();

        $pageTranslationCa = new PageTranslation();
        $pageTranslationCa->page_id = $page->id;
        $pageTranslationCa->lang = "ca";
        $pageTranslationCa->slug = "contacte";
        $pageTranslationCa->meta_title = "Contacte";
        $pageTranslationCa->meta_description = "Contacta amb l'editorial Èter Edicions";
        $pageTranslationCa->save();

        $pageCaContentH1 = new PageContent();
        $pageCaContentH1->page_translation_id = $pageTranslationCa->id;
        $pageCaContentH1->key = "h1";
        $pageCaContentH1->content = "Contacte";
        $pageCaContentH1->save();

        $pageCaContentP1 = new PageContent();
        $pageCaContentP1->page_translation_id = $pageTranslationCa->id;
        $pageCaContentP1->key = "p1";
        $pageCaContentP1->content = <<<HEREDOC
        A Èter estem constantment buscant obres interessants en àrab per portar-les a Catalunya, i obres en català per exportar-les al món àrab. Centrem els nostres esforços i recursos en apropar el món àrab i el català a través de la lectura, sempre amb una perspectiva crítica i decolonial. Si el teu manuscrit encaixa en aquests paràmetres, sigui una obra de ficció, poesia, teatre, pensament o assaig, ens la pots fer arribar i estarem encantats de llegir-la.\n\nTens algun dubte o suggeriment? Algun problema amb la teva comanda? Vols que et recomanem el llibre que t'agradarà més? Vols preguntar-nos sobre els drets d'autor o portar al teu país un llibre que hem editat? Posa't en contacte amb nosaltres.\nEt contestarem l'abans possible.
        HEREDOC;
        $pageCaContentP1->save();

        $pageCaContentCompanyName = new PageContent();
        $pageCaContentCompanyName->page_translation_id = $pageTranslationCa->id;
        $pageCaContentCompanyName->key = "company-name";
        $pageCaContentCompanyName->content = <<<HEREDOC
        Serveis Editorials Èter S.L.
        HEREDOC;;
        $pageCaContentCompanyName->save();

        $pageCaContentAddress = new PageContent();
        $pageCaContentAddress->page_translation_id = $pageTranslationCa->id;
        $pageCaContentAddress->key = "address";
        $pageCaContentAddress->content = "Sant Gil 16, 3-1";
        $pageCaContentAddress->save();

        $pageCaContentZipCodeAndCity = new PageContent();
        $pageCaContentZipCodeAndCity->page_translation_id = $pageTranslationCa->id;
        $pageCaContentZipCodeAndCity->key = "zip-code-city";
        $pageCaContentZipCodeAndCity->content = "08001 Barcelona";
        $pageCaContentZipCodeAndCity->save();

        // $pageCaContentEmail = new PageContent();
        // $pageCaContentEmail->page_translation_id = $pageTranslationCa->id;
        // $pageCaContentEmail->key = "email";
        // $pageCaContentEmail->content = "info@eteredicions.com";
        // $pageCaContentEmail->save();

        $pageCaContentFormTitle = new PageContent();
        $pageCaContentFormTitle->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormTitle->key = "form-title";
        $pageCaContentFormTitle->content = "Formulari de contacte";
        $pageCaContentFormTitle->save();

        $pageCaContentFormSubject = new PageContent();
        $pageCaContentFormSubject->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormSubject->key = "form-subject";
        $pageCaContentFormSubject->content = "Assumpte";
        $pageCaContentFormSubject->save();

        $subjects = json_encode(["Comandes", "Premsa i comunicació", "Foreign rights", "Drets d'autor", "Manuscrits", "Altres"]);
        $pageCaContentFormSubjects = new PageContent();
        $pageCaContentFormSubjects->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormSubjects->key = "form-subjects";
        $pageCaContentFormSubjects->content = $subjects;
        $pageCaContentFormSubjects->save();

        $pageCaContentFormName = new PageContent();
        $pageCaContentFormName->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormName->key = "form-name";
        $pageCaContentFormName->content = trans('form.name');
        $pageCaContentFormName->save();

        $pageCaContentFormEmail = new PageContent();
        $pageCaContentFormEmail->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormEmail->key = "form-email";
        $pageCaContentFormEmail->content = trans('form.email');
        $pageCaContentFormEmail->save();

        $pageCaContentFormMessage = new PageContent();
        $pageCaContentFormMessage->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormMessage->key = "form-message";
        $pageCaContentFormMessage->content = trans('form.message');
        $pageCaContentFormMessage->save();

        $pageCaContentFormTermsDisclaimer = new PageContent();
        $pageCaContentFormTermsDisclaimer->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormTermsDisclaimer->key = "terms-disclaimer";
        $pageCaContentFormTermsDisclaimer->content = trans('form.terms_disclaimer');
        $pageCaContentFormTermsDisclaimer->save();

        $pageCaContentFormPrivacyPolicy = new PageContent();
        $pageCaContentFormPrivacyPolicy->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormPrivacyPolicy->key = "privacy-policy";
        $pageCaContentFormPrivacyPolicy->content = trans('form.privacy_policy');
        $pageCaContentFormPrivacyPolicy->save();

        $pageCaContentFormTermsBasic = new PageContent();
        $pageCaContentFormTermsBasic->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormTermsBasic->key = "terms-basic";
        $pageCaContentFormTermsBasic->content = trans('form.terms_basic');
        $pageCaContentFormTermsBasic->save();

        $pageCaContentFormTermsAdvertising = new PageContent();
        $pageCaContentFormTermsAdvertising->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormTermsAdvertising->key = "terms-advertising";
        $pageCaContentFormTermsAdvertising->content = trans('form.terms_advertising');
        $pageCaContentFormTermsAdvertising->save();

        $pageCaContentFormSendButton = new PageContent();
        $pageCaContentFormSendButton->page_translation_id = $pageTranslationCa->id;
        $pageCaContentFormSendButton->key = "send-button";
        $pageCaContentFormSendButton->content = trans('form.send');
        $pageCaContentFormSendButton->save();
    }
}
