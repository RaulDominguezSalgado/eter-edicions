<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 - Majd Kayyal
        $majdkayyal = new Collaborator();
        $majdkayyal->image = "collab-1.webp";
        $majdkayyal->social_networks = '{"instagram": "https://www.instagram.com/majdkayyal/", "twitter": "https://twitter.com/Majdkayyal"}';
        $majdkayyal->save();

        $majdkayyalTranslation = new CollaboratorTranslation();
        $majdkayyalTranslation->collaborator_id = 1;
        $majdkayyalTranslation->lang = "ca";
        $majdkayyalTranslation->first_name = "Majd";
        $majdkayyalTranslation->last_name = "Kayyal";
        $majdkayyalTranslation->biography = <<<HEREDOC
        Majd Kayyal (1990) és un escriptor, activista i periodista palestí. Ha rebut el premi Abdul Mohsen Al-Qattan de Literatura Jove del 2016.
        És autor de tres novel·les, dos reculls musicats de poesia, a més de diverses investigacions i articles sobre actualitat política del Llevant.
        HEREDOC;
        $majdkayyalTranslation->slug = "majd-kayyal";
        $majdkayyalTranslation->save();


        // 2- Moha
        $mohamadbitari = new Collaborator();
        $mohamadbitari->image = "collab-2.webp";
        $mohamadbitari->social_networks = '{"instagram": "https://www.instagram.com/mohammadbitari/", "facebook": "https://www.facebook.com/mohammad.bitari1/", "twitter": "https://twitter.com/bitari_m"}';
        $mohamadbitari->save();

        $mohamadbitariTranslation = new CollaboratorTranslation();
        $mohamadbitariTranslation->collaborator_id = 2;
        $mohamadbitariTranslation->lang = "ca";
        $mohamadbitariTranslation->first_name = "Mohammad";
        $mohamadbitariTranslation->last_name = "Bitari";
        $mohamadbitariTranslation->biography = <<<HEREDOC
        Mohamad Bitari és un poeta, traductor, escriptor i periodista palestí de Síria establert a Barcelona. Va néixer el 1990 al camp de refugiats palestins de Yarmouk a Síria, on va viure fins als vint-i-tres anys. La seva família va fugir de la ciutat de Natzaret el 1948 (any de la Nakba) i es va instal·lar a Síria després de l'ocupació del nou Estat d'Israel a Palestina.  Bitari és fundador d'Èter Edicions, especialitzada en traduccions de l'àrab al català i viceversa. Forma part del Comitè d'Escriptors Perseguits de la Fundació Pen Club a Catalunya, i treballa com a traductor de literatura catalana i literatura espanyola; també imparteix classes d'àrab a la Universitat Autònoma de Barcelona i col·labora habitualment amb institucions culturals per establir ponts entre Catalunya i el mon àrab. Ha traduït a l'àrab autors com ara Federico García Lorca, Rafael Alberti, Miguel Hernández, Tomas Cohen i Miquel Martí i Pol. És autor de Jo soc vosaltres, sis poetes de Síria (2019), una versió bilingüe en àrab-català amb traducció de Margarida Castells i Criballés, en col·laboració amb les editorials Polen i Godall i la fundació Sodepau.
        HEREDOC;
        $mohamadbitariTranslation->slug = "mohammad-bitari";
        $mohamadbitariTranslation->save();


        // 3- Ismael Profitós
        $ismaelprofitos = new Collaborator();
        $ismaelprofitos->image = "collab-3.webp";
        $ismaelprofitos->social_networks = '{"linkedin": "https://es.linkedin.com/in/ismael-profit%C3%B3s-9a9284145"}';
        $ismaelprofitos->save();

        $ismaelprofitosTranslation = new CollaboratorTranslation();
        $ismaelprofitosTranslation->collaborator_id = 3;
        $ismaelprofitosTranslation->lang = "ca";
        $ismaelprofitosTranslation->first_name = "Ismael";
        $ismaelprofitosTranslation->last_name = "Profitós";
        $ismaelprofitosTranslation->biography = <<<HEREDOC
        blablablabla
        HEREDOC;
        $ismaelprofitosTranslation->slug = "ismael-profitos";
        $ismaelprofitosTranslation->save();

        // 4- Margarida Castells
        $margaridacastells = new Collaborator();
        $margaridacastells->image = "collab-1.webp";
        $margaridacastells->social_networks = '{"wikipedia": "https://ca.wikipedia.org/wiki/Margarida_Castells_i_Criball%C3%A9s"}';
        $margaridacastells->save();

        $margaridacastellsTranslation = new CollaboratorTranslation();
        $margaridacastellsTranslation->collaborator_id = 4;
        $margaridacastellsTranslation->lang = "ca";
        $margaridacastellsTranslation->first_name = "Margarida";
        $margaridacastellsTranslation->last_name = "Castells";
        $margaridacastellsTranslation->biography = <<<HEREDOC
        Margarida Castells i Criballés (Torelló, 1962) és traductora de l'àrab, investigadora i professora Coautora amb Dolors Cinca de dues versions dels reculls d'històries de Les mil i una nits (Premi Ciutat de Barcelona de traducció en llengua catalana - 1996 i Premi Crítica Serra d'Or de traducció - 1997). En col·laboració amb Manuel Forcano va traduir els relats de viatges d'Ibn Battuta (2005 - Premi Crítica Serra d'Or de traducció 2006), i, en solitari, textos de Salim Barakat, i Mahmud Darwix entre d'altres.
        Ha estat docent a la Universitat de Barcelona, i s'ha dedicat a les traduccions llatines de l'Alcorà i a la codicologia. Ha col·laborat amb el Museu Egipci de Barcelona (Fundació Arqueològica Clos) com a directora científica d'expedicions culturals a Etiòpia i a l'Uzbekistan. També ha format part de diverses expedicions de catalogació i conservació de manuscrits als països de l'àrea mediterrània. Com a filòloga i arabista és coautora, amb Dolors Cinca, del primer Diccionari àrab-català, que té per objecte l'àrab estàndard modern.
        HEREDOC;
        $margaridacastellsTranslation->slug = "margarida-castells";
        $margaridacastellsTranslation->save();


        // 5- Rammi Abbas
        $rammiabbas = new Collaborator();
        $rammiabbas->image = "collab-2.webp";
        $rammiabbas->social_networks = '{"facebook": "https://www.facebook.com/rami.abbas.902/", "twitter": "https://twitter.com/RamiAbbas48"}';
        $rammiabbas->save();

        $rammiabbasTranslation = new CollaboratorTranslation();
        $rammiabbasTranslation->collaborator_id = 5;
        $rammiabbasTranslation->lang = "ca";
        $rammiabbasTranslation->first_name = "Rammi";
        $rammiabbasTranslation->last_name = "Abbas";
        $rammiabbasTranslation->biography = <<<HEREDOC
        blablablabla
        HEREDOC;
        $rammiabbasTranslation->slug = "rammi-abbas";
        $rammiabbasTranslation->save();

        // 6- Rasha Omran
        $rashaomran = new Collaborator();
        $rashaomran->image = "collab-3.webp";
        $rashaomran->social_networks = '{}';
        $rashaomran->save();

        $rashaomranTranslation = new CollaboratorTranslation();
        $rashaomranTranslation->collaborator_id = 6;
        $rashaomranTranslation->lang = "ca";
        $rashaomranTranslation->first_name = "Rasha";
        $rashaomranTranslation->last_name = "Omran";
        $rashaomranTranslation->biography = <<<HEREDOC
        Rasha Omran (1964) és llicenciada en Literatura Àrab per la Universitat de Damasc. Ha estat directora del Festival de Cultura al-Sindiyan. És autora de set poemaris i una antologia de poesia siriana, publicada l’any 2008.
        Crítica pública del règim d’El Assad, contra el qual s’ha manifestat en entrevistes i articles, es va exiliar al Caire el 2012, després d’amenaces de la dictadura contra ella i la seva família.
        Omran ha estat considerada, per la seva aposta estilística. la juntura entre la generació clàssica i les noves generacions en la poesia de Síria.
        HEREDOC;
        $rashaomranTranslation->slug = "rasha-omran";
        $rashaomranTranslation->save();

        // 7- Pontus Sánchez
        $pontussanchez = new Collaborator();
        $pontussanchez->image = "collab-1.webp";
        $pontussanchez->social_networks = '{}';
        $pontussanchez->save();

        $pontussanchezTranslation = new CollaboratorTranslation();
        $pontussanchezTranslation->collaborator_id = 7;
        $pontussanchezTranslation->lang = "ca";
        $pontussanchezTranslation->first_name = "Pontus";
        $pontussanchezTranslation->last_name = "Sánchez";
        $pontussanchezTranslation->biography = <<<HEREDOC
        Necessito la descripció del Pontus, no la tinc :)
        HEREDOC;
        $pontussanchezTranslation->slug = "pontus-sanchez";
        $pontussanchezTranslation->save();

        // 8- Oriol Rissech
        $oriolrissech = new Collaborator();
        $oriolrissech->image = "collab-2.webp";
        $oriolrissech->social_networks = '{"instagram": "https://www.instagram.com/reginald_langsham", "facebook": "https://es-es.facebook.com/oriol.gasulla/"}';
        $oriolrissech->save();

        $oriolrissechTranslation = new CollaboratorTranslation();
        $oriolrissechTranslation->collaborator_id = 8;
        $oriolrissechTranslation->lang = "ca";
        $oriolrissechTranslation->first_name = "Oriol";
        $oriolrissechTranslation->last_name = "Rissech";
        $oriolrissechTranslation->biography = <<<HEREDOC
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lorem orci, interdum vitae ornare sit amet, luctus non diam. Sed nec purus feugiat, tincidunt nisl ac, tincidunt diam. Fusce consequat, tortor eu porttitor tempus, sem lacus lobortis ipsum, id pretium nisi nisi ut libero. Praesent gravida volutpat turpis, eu semper ex ultrices ullamcorper. Aliquam erat volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin lorem elit, euismod sed erat at, suscipit condimentum enim. Donec aliquet at magna sit amet blandit. Curabitur scelerisque pharetra nibh nec sollicitudin. Nam maximus lacus id purus ornare vestibulum. Nulla vitae bibendum purus. Integer auctor luctus placerat. Nullam ultricies sodales eros sed facilisis. Suspendisse tortor nulla, fringilla ut purus a, porta sollicitudin enim. Ut accumsan hendrerit malesuada.
        HEREDOC;
        $oriolrissechTranslation->slug = "oriol-rissech";
        $oriolrissechTranslation->save();


        // 9- Elisabeth Hultcrantz
        $elisabethhultcrantz = new Collaborator();
        $elisabethhultcrantz->image = "collab-1.webp";
        $elisabethhultcrantz->social_networks = '{}';
        $elisabethhultcrantz->save();

        $elisabethhultcrantzTranslation = new CollaboratorTranslation();
        $elisabethhultcrantzTranslation->collaborator_id = 9;
        $elisabethhultcrantzTranslation->lang = "ca";
        $elisabethhultcrantzTranslation->first_name = "Elisabeth";
        $elisabethhultcrantzTranslation->last_name = "Hultcrantz";
        $elisabethhultcrantzTranslation->biography = <<<HEREDOC
        Elisabeth Hultcrantz (1942) és professora Sènior en otorrinolaringologia. Des del 2008, i través de Metges del Món (MdM), ha estat treballant amb nens refugiats, i en concret amb infants afectats de la síndrome de resignació.

        És autora de nombrosos articles, pels quals ha guanyat el Primer Premi d’Assaig de l’Associació de Psicologia mèdica. Així mateix, és l’editora d’un llibre sobre metgesses acadèmiques, i ha participat en la biografia de la doctora Gussander.
        HEREDOC;
        $elisabethhultcrantzTranslation->slug = "elisabeth-hultcrantz";
        $elisabethhultcrantzTranslation->save();


        // 10- Sàdiq Jalal al-Àzem
        $sadiqjalalalazem = new Collaborator();
        $sadiqjalalalazem->image = "collab-3.webp";
        $sadiqjalalalazem->social_networks = '{}';
        $sadiqjalalalazem->save();

        $sadiqjalalalazemTranslation = new CollaboratorTranslation();
        $sadiqjalalalazemTranslation->collaborator_id = 10;
        $sadiqjalalalazemTranslation->lang = "ca";
        $sadiqjalalalazemTranslation->first_name = "Sàdiq Jalal";
        $sadiqjalalalazemTranslation->last_name = "al-Àzem";
        $sadiqjalalalazemTranslation->biography = <<<HEREDOC
        Sàdiq Jalal al-Àzem (Damasc, 1934 – Berlín, 2016) fou un dels representants més destacats del pensament marxis ta, nacionalista i laic al món àrab contemporani, i també un conegut defensor de la democràcia, dels drets humans i de la llibertat d’expressió. La redacció d’Orientalisme invers li valgué la fi de l’amistat amb Edward W. Said.
        HEREDOC;
        $sadiqjalalalazemTranslation->slug = "sadiq-jalal-al-azem";
        $sadiqjalalalazemTranslation->save();

        // 11- Sélim Nassib
        $selimnassib = new Collaborator();
        $selimnassib->image = "collab-1.webp";
        $selimnassib->social_networks = '{}';
        $selimnassib->save();

        $selimnassibTranslation = new CollaboratorTranslation();
        $selimnassibTranslation->collaborator_id = 11;
        $selimnassibTranslation->lang = "ca";
        $selimnassibTranslation->first_name = "Sélim";
        $selimnassibTranslation->last_name = "Nassib";
        $selimnassibTranslation->biography = <<<HEREDOC
        Sélim Nassib (Beirut, 1946) és un escriptor i periodista libanès. Va exercir com a corresponsal al Pròxim Orient pel mitjà francès Libération. Des del 1990, s’ha dedicat plenament a l’escriptura, tant a l’assaig periodístic com a la narrativa de ficció. És autor dels llibres de relats ‘L’home assegut’ (Balland, 1990) i ‘Un vespre a Beirut’ (Thierry Magnier, 2007); de les novel·les ‘El boig de Beirut’ (Balland, 1992), ‘Clandestí’ (Balland, 1998) i ‘L’aldarull’ (Éditions de l’Olivier, 2022). Ha treballat, igualment, com a coguionista a ‘Els guants d’or d’Akka’ (1992) i a ‘Would you have sex with an Arab?’ (2012). Com a assagista, ha destacat amb ‘Oum’ (Balland, 1994), amb ‘Un amant a Palestina (Robert Laffont, 2004) i amb ‘La insubmisa de Gaza’ (2016).
        HEREDOC;
        $selimnassibTranslation->slug = "selim-nassib";
        $selimnassibTranslation->save();

        // 12- Asmaa Alghoul
        $asmaaalghoul = new Collaborator();
        $asmaaalghoul->image = "collab-1.webp";
        $asmaaalghoul->social_networks = '{}';
        $asmaaalghoul->save();

        $asmaaalghoulTranslation = new CollaboratorTranslation();
        $asmaaalghoulTranslation->collaborator_id = 12;
        $asmaaalghoulTranslation->lang = "ca";
        $asmaaalghoulTranslation->first_name = "Asmaa";
        $asmaaalghoulTranslation->last_name = "Alghoul";
        $asmaaalghoulTranslation->biography = <<<HEREDOC
        Asmaa Alghoul (Rafah, 1982) és una periodista i escriptora palestina. Ha treballat en mitjans com Al-Ayyam, Al-Monitor i la Fundació Samir Kassir. És autora del llibre de relats ‘Separació sobre quadre negre’ (2006). Va fundar, el 2010, amb altres col·laboradors, el moviment liberal i secular «Isha!» (‘Desperta’t!).
        Per la seva activitat periodística i militant, ha rebut els premis Hellman-Hammet de Human Rights Watch (2010) i Valor en el Periodisme per la International Women's Media Foundation (2012), a més del Premi de Literatura Juvenil Palestina (2000).
        Des del 2016, i degut a la seva oposició frontal a Hamàs, viu a França, on ha continuat amb la seva activitat a diversos mitjans de comunicació.
        HEREDOC;
        $asmaaalghoulTranslation->slug = "selim-nassib";
        $asmaaalghoulTranslation->save();
    }
}
