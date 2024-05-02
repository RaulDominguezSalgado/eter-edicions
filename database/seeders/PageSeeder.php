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
        $this->agency();
    }

    private function foreignrights(){
        $foreignrights = new Page();
        $foreignrights->tag = "foreign-rights";
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
        $foreignrightsCaContentP1->content = "Els nostres drets de traducció són gestionats per Serveis Editorials Èter S.L.";
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



        $foreignrightsTranslationEs = new PageTranslation();
        $foreignrightsTranslationEs->page_id = $foreignrights->id;
        $foreignrightsTranslationEs->lang = "es";
        $foreignrightsTranslationEs->slug = "foreign-rights";
        $foreignrightsTranslationEs->meta_title = "Foreign rights";
        $foreignrightsTranslationEs->meta_description = "Información sobre los derechos de traducción (foreign rights) de la editorial Èter Edicions";
        $foreignrightsTranslationEs->save();

        $foreignrightsEsContentTitle = new PageContent();
        $foreignrightsEsContentTitle->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentTitle->key = "title";
        $foreignrightsEsContentTitle->content = "Foreign rights";
        $foreignrightsEsContentTitle->save();

        $foreignrightsEsContentP1 = new PageContent();
        $foreignrightsEsContentP1->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentP1->key = "p1";
        $foreignrightsEsContentP1->content = "Nuestros derechos de traducción son gestionados por Serveis Editorials Èter S.L.";
        $foreignrightsEsContentP1->save();

        $foreignrightsEsContentMoreInfo = new PageContent();
        $foreignrightsEsContentMoreInfo->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentMoreInfo->key = "more-info";
        $foreignrightsEsContentMoreInfo->content = "Para más información, por favor contactar con:";
        $foreignrightsEsContentMoreInfo->save();

        $foreignrightsEsContentContactPerson = new PageContent();
        $foreignrightsEsContentContactPerson->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentContactPerson->key = "contact-person";
        $foreignrightsEsContentContactPerson->content = "Oriol Rissech";
        $foreignrightsEsContentContactPerson->save();

        $foreignrightsEsContentContactEmail = new PageContent();
        $foreignrightsEsContentContactEmail->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentContactEmail->key = "contact-email";
        $foreignrightsEsContentContactEmail->content = "orissech@eteredicions.com";
        $foreignrightsEsContentContactEmail->save();

        $foreignrightsEsContentAgency = new PageContent();
        $foreignrightsEsContentAgency->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentAgency->key = "agency";
        $foreignrightsEsContentAgency->content = "Serveis Editorials Èter S.L.";
        $foreignrightsEsContentAgency->save();

        $foreignrightsEsContentDownloadLabel = new PageContent();
        $foreignrightsEsContentDownloadLabel->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentDownloadLabel->key = "download-label";
        $foreignrightsEsContentDownloadLabel->content = "Catálogo de derechos";
        $foreignrightsEsContentDownloadLabel->save();

        $foreignrightsEsContentDownloadFile = new PageContent();
        $foreignrightsEsContentDownloadFile->page_translation_id = $foreignrightsTranslationEs->id;
        $foreignrightsEsContentDownloadFile->key = "download-file";
        $foreignrightsEsContentDownloadFile->content = "foreign-rights-catalogue.pdf";
        $foreignrightsEsContentDownloadFile->save();



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
        $page->tag="about";
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



        $pageTranslationEs = new PageTranslation();
        $pageTranslationEs->page_id = $page->id;
        $pageTranslationEs->lang = "es";
        $pageTranslationEs->slug = "sobre-nosotros";
        $pageTranslationEs->meta_title = "Sobre nosotros";
        $pageTranslationEs->meta_description = "Información sobre la editorial Èter Edicions, especializada en traducciones del árabe al catalán y del catalán al árab de obras de poesía, pensamiento, novelas y teatro";
        $pageTranslationEs->save();

        $pageEsContentH1 = new PageContent();
        $pageEsContentH1->page_translation_id = $pageTranslationEs->id;
        $pageEsContentH1->key = "h1";
        $pageEsContentH1->content = "Èter Edicions";
        $pageEsContentH1->save();

        $pageEsContentP1 = new PageContent();
        $pageEsContentP1->page_translation_id = $pageTranslationEs->id;
        $pageEsContentP1->key = "p1";
        $pageEsContentP1->content = <<<HEREDOC
        Es una <strong>editorial</strong> radicada en <strong>Barcelona</strong> y fundada en el año 2023, nacida con la voluntad de acercar las tradiciones literarias en <strong>catalán y árabe</strong>. Nuestra actividad se basa, pues, en traducir publicaciones contemporáneas de cada una de les lenguas a la otra, así como de publicar textos inéditos en un y otro idioma.\nLa editorial aparece principalmente por culpa de <strong>Mohammad Bitari</strong>. Este poeta, dramaturgo y traductor palestino echaba de menos acceso a un mundo que conoce bien y que no llega lo suficiente al otro lado del Mediterráneo: la producción escrita en árabe. A pesar de la enorme calidad y variedad de las publicaciones -sean de poesía, teatro, novela o pensamiento-, las traducciones que llegan a Occidente, y sobretodo en catalán, son, o bien escasas, o inexistentes.\nPara resolver esto, fundó Èter, mano a mano con el poeta y crítico literario <strong>Oriol Rissech</strong>.
        HEREDOC;;
        $pageEsContentP1->save();

    }

    private function contact(){
        $page = new Page();
        $page->tag="contact";
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



        $pageTranslationEs = new PageTranslation();
        $pageTranslationEs->page_id = $page->id;
        $pageTranslationEs->lang = "es";
        $pageTranslationEs->slug = "contacto";
        $pageTranslationEs->meta_title = "Contacto";
        $pageTranslationEs->meta_description = "Contacta con la editorial Èter Edicions";
        $pageTranslationEs->save();

        $pageEsContentH1 = new PageContent();
        $pageEsContentH1->page_translation_id = $pageTranslationEs->id;
        $pageEsContentH1->key = "h1";
        $pageEsContentH1->content = "Contacto";
        $pageEsContentH1->save();

        $pageEsContentP1 = new PageContent();
        $pageEsContentP1->page_translation_id = $pageTranslationEs->id;
        $pageEsContentP1->key = "p1";
        $pageEsContentP1->content = <<<HEREDOC
        En Èter estamos constantmente buscando obras interesantes en árabe para llevarlas a Catalunya, y obras en catalán para exportarlas al mundo árabe. Centramos nuestros esfuerzos y recursos en acercar el mundo árabe y el catalán a través de la lectura, siempre con una perspectiva crítica y decolonial. Si tu manuscrito encaja en estos parámetros, sea una obra de ficción, poesía, teatro, pensamiento o ensayo, nos la puedes enviar y estaremos encantados de leerla.\n\n¿Tienes alguna duda o sugerencia? ¿Algún problema con tu pedido? ¿Quieres que te recomendemos el libro que idóneo para ti? ¿Quieres preguntarnos sobre derechos de autor o llevar a tu país un libro que hemos editado? Ponte en contacto con nosotros.\nTe contestaremos lo antes posible.
        HEREDOC;
        $pageEsContentP1->save();

        $pageEsContentCompanyName = new PageContent();
        $pageEsContentCompanyName->page_translation_id = $pageTranslationEs->id;
        $pageEsContentCompanyName->key = "company-name";
        $pageEsContentCompanyName->content = <<<HEREDOC
        Serveis Editorials Èter S.L.
        HEREDOC;;
        $pageCaContentCompanyName->save();

        $pageEsContentAddress = new PageContent();
        $pageEsContentAddress->page_translation_id = $pageTranslationEs->id;
        $pageEsContentAddress->key = "address";
        $pageEsContentAddress->content = "Sant Gil 16, 3-1";
        $pageEsContentAddress->save();

        $pageEsContentZipCodeAndCity = new PageContent();
        $pageEsContentZipCodeAndCity->page_translation_id = $pageTranslationEs->id;
        $pageEsContentZipCodeAndCity->key = "zip-code-city";
        $pageEsContentZipCodeAndCity->content = "08001 Barcelona";
        $pageEsContentZipCodeAndCity->save();

        // $pageEsContentEmail = new PageContent();
        // $pageEsContentEmail->page_translation_id = $pageTranslationEs->id;
        // $pageEsContentEmail->key = "email";
        // $pageEsContentEmail->content = "info@eteredicions.com";
        // $pageEsContentEmail->save();

        $pageEsContentFormTitle = new PageContent();
        $pageEsContentFormTitle->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormTitle->key = "form-title";
        $pageEsContentFormTitle->content = "Formulario de contacto";
        $pageEsContentFormTitle->save();

        $pageEsContentFormSubject = new PageContent();
        $pageEsContentFormSubject->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormSubject->key = "form-subject";
        $pageEsContentFormSubject->content = "Asunto";
        $pageEsContentFormSubject->save();

        $subjects = json_encode(["Pedidos", "Prensa y comunicación", "Foreign rights", "Derechos de autor", "Manuscritos", "Otros"]);
        $pageEsContentFormSubjects = new PageContent();
        $pageEsContentFormSubjects->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormSubjects->key = "form-subjects";
        $pageEsContentFormSubjects->content = $subjects;
        $pageEsContentFormSubjects->save();

        $pageEsContentFormName = new PageContent();
        $pageEsContentFormName->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormName->key = "form-name";
        $pageEsContentFormName->content = 'Nombre y apellidos';
        $pageEsContentFormName->save();

        $pageEsContentFormEmail = new PageContent();
        $pageEsContentFormEmail->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormEmail->key = "form-email";
        $pageEsContentFormEmail->content = 'E-mail';
        $pageEsContentFormEmail->save();

        $pageEsContentFormMessage = new PageContent();
        $pageEsContentFormMessage->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormMessage->key = "form-message";
        $pageEsContentFormMessage->content = "Mensaje";
        $pageEsContentFormMessage->save();

        $pageEsContentFormTermsDisclaimer = new PageContent();
        $pageEsContentFormTermsDisclaimer->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormTermsDisclaimer->key = "terms-disclaimer";
        $pageEsContentFormTermsDisclaimer->content = "SERVEIS EDITORIALS ÈTER, S.L. como responsable del tratamiento de tus datos, los tratará con el objetivo de dar respuesta a tu consulta o petición. Puedes ejercir tus derechos consultando la información adicional detallada sobre la protección de datos en nuestra";
        $pageEsContentFormTermsDisclaimer->save();

        $pageEsContentFormPrivacyPolicy = new PageContent();
        $pageEsContentFormPrivacyPolicy->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormPrivacyPolicy->key = "privacy-policy";
        $pageEsContentFormPrivacyPolicy->content = "Política de privacidad";
        $pageEsContentFormPrivacyPolicy->save();

        $pageEsContentFormTermsBasic = new PageContent();
        $pageEsContentFormTermsBasic->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormTermsBasic->key = "terms-basic";
        $pageEsContentFormTermsBasic->content = "He leído y acepto las condiciones contenidas en la política de privacidad sobre el tratamiento de mis datos para gestionar mi compra, consulta o petición.";
        $pageEsContentFormTermsBasic->save();

        $pageEsContentFormTermsAdvertising = new PageContent();
        $pageEsContentFormTermsAdvertising->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormTermsAdvertising->key = "terms-advertising";
        $pageEsContentFormTermsAdvertising->content = "Acepto recibir información comercial sobre los productos, servicios y novedades de SERVEIS EDITORIALS ÈTER S.L.";
        $pageEsContentFormTermsAdvertising->save();

        $pageEsContentFormSendButton = new PageContent();
        $pageEsContentFormSendButton->page_translation_id = $pageTranslationEs->id;
        $pageEsContentFormSendButton->key = "send-button";
        $pageEsContentFormSendButton->content = "Enviar";
        $pageEsContentFormSendButton->save();
    }

    private function agency(){
        $page = new Page();
        $page->tag="agency";
        $page->save();

        $pageTranslationCa = new PageTranslation();
        $pageTranslationCa->page_id = $page->id;
        $pageTranslationCa->lang = "ca";
        $pageTranslationCa->slug = "agencia";
        $pageTranslationCa->meta_title = "Agència";
        $pageTranslationCa->meta_description = "Informació sobre l'agència de representació de professionals de la cultura d'Èter Edicions. Èter representa escriptors, poetes, assagistes, autors de teatre, traductors, il·lustradors...";
        $pageTranslationCa->save();

        $pageCaContentH1 = new PageContent();
        $pageCaContentH1->page_translation_id = $pageTranslationCa->id;
        $pageCaContentH1->key = "h1";
        $pageCaContentH1->content = ucfirst(__('general.agency'));
        $pageCaContentH1->save();

        $pageCaContentP1 = new PageContent();
        $pageCaContentP1->page_translation_id = $pageTranslationCa->id;
        $pageCaContentP1->key = "p1";
        $pageCaContentP1->content = <<<HEREDOC
        Sed sollicitudin libero eu lacus sodales ultricies molestie ut justo.  Nunc aliquet maximus est, sed sodales lacus accumsan in. Curabitur ut  risus sem. Fusce sit amet est mauris. Donec malesuada velit nec  venenatis rhoncus. Phasellus interdum, quam eget blandit interdum, velit  risus vulputate mauris, quis iaculis neque nisi sed turpis. In eget  nisi a nibh efficitur hendrerit a vitae ligula. Ut a nibh placerat,  iaculis urna a, imperdiet massa. Integer non mauris rhoncus, mattis.
        HEREDOC;;
        $pageCaContentP1->save();

        $pageTranslationEs = new PageTranslation();
        $pageTranslationEs->page_id = $page->id;
        $pageTranslationEs->lang = "es";
        $pageTranslationEs->slug = "agencia";
        $pageTranslationEs->meta_title = "Agencia";
        $pageTranslationEs->meta_description = "Información sobre la agencia de representación de profesionales de la cultura de Èter Edicions. Èter representa escritores, poetas, ensayistas, autores de teatro, traductores, ilustradores...";
        $pageTranslationEs->save();

        $pageEsContentH1 = new PageContent();
        $pageEsContentH1->page_translation_id = $pageTranslationEs->id;
        $pageEsContentH1->key = "h1";
        $pageEsContentH1->content = ucfirst(__('general.agency'));
        $pageEsContentH1->save();

        $pageEsContentP1 = new PageContent();
        $pageEsContentP1->page_translation_id = $pageTranslationEs->id;
        $pageEsContentP1->key = "p1";
        $pageEsContentP1->content = <<<HEREDOC
        Sed sollicitudin libero eu lacus sodales ultricies molestie ut justo.  Nunc aliquet maximus est, sed sodales lacus accumsan in. Curabitur ut  risus sem. Fusce sit amet est mauris. Donec malesuada velit nec  venenatis rhoncus. Phasellus interdum, quam eget blandit interdum, velit  risus vulputate mauris, quis iaculis neque nisi sed turpis. In eget  nisi a nibh efficitur hendrerit a vitae ligula. Ut a nibh placerat,  iaculis urna a, imperdiet massa. Integer non mauris rhoncus, mattis.
        HEREDOC;;
        $pageEsContentP1->save();

    }
}
