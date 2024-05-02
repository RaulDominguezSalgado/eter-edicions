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
        $majdkayyal->image = "majd-kayyal.webp";
        $majdkayyal->social_networks = '{"instagram": "https://www.instagram.com/majdkayyal/", "twitter": "https://twitter.com/Majdkayyal"}';
        $majdkayyal->save();

        $majdkayyalTranslationCa = new CollaboratorTranslation();
        $majdkayyalTranslationCa->collaborator_id = $majdkayyal->id;
        $majdkayyalTranslationCa->lang = "ca";
        $majdkayyalTranslationCa->first_name = "Majd";
        $majdkayyalTranslationCa->last_name = "Kayyal";
        $majdkayyalTranslationCa->biography = <<<HEREDOC
        Majd Kayyal (1990) és un escriptor, activista i periodista palestí. Ha rebut el premi Abdul Mohsen Al-Qattan de Literatura Jove del 2016.
        És autor de tres novel·les, dos reculls musicats de poesia, a més de diverses investigacions i articles sobre actualitat política del Llevant.
        HEREDOC;
        $majdkayyalTranslationCa->slug = "majd-kayyal";
        $majdkayyalTranslationCa->meta_title = $majdkayyalTranslationCa->first_name . " " . $majdkayyalTranslationCa->last_name;
        $majdkayyalTranslationCa->meta_description = $majdkayyalTranslationCa->biography;
        $majdkayyalTranslationCa->save();

        $majdkayyalTranslationEs = new CollaboratorTranslation();
        $majdkayyalTranslationEs->collaborator_id = $majdkayyal->id;
        $majdkayyalTranslationEs->lang = "es";
        $majdkayyalTranslationEs->first_name = "Majd";
        $majdkayyalTranslationEs->last_name = "Kayyal";
        $majdkayyalTranslationEs->biography = <<<HEREDOC
        Majd Kayyal (1990) es un escritor, activista y periodista palestino. Ha recibido el premio Abdul Mohsen Al-Qattan de Literatura Joven del 2016.
        Es autor de tres novelas, dos recopilaciones musicadas de poesía, además de varias investigaciones y artículos sobre actualidad política del Levante.
        HEREDOC;
        $majdkayyalTranslationEs->slug = "majd-kayyal";
        $majdkayyalTranslationEs->meta_title = $majdkayyalTranslationEs->first_name . " " . $majdkayyalTranslationEs->last_name;
        $majdkayyalTranslationEs->meta_description = $majdkayyalTranslationEs->biography;
        $majdkayyalTranslationEs->save();


        // 2- Moha
        $mohamadbitari = new Collaborator();
        $mohamadbitari->image = "mohammad-bitari.webp";
        $mohamadbitari->social_networks = '{"instagram": "https://www.instagram.com/mohammadbitari/", "facebook": "https://www.facebook.com/mohammad.bitari1/", "twitter": "https://twitter.com/bitari_m"}';
        $mohamadbitari->save();

        $mohamadbitariTranslation = new CollaboratorTranslation();
        $mohamadbitariTranslation->collaborator_id = $mohamadbitari->id;
        $mohamadbitariTranslation->lang = "ca";
        $mohamadbitariTranslation->first_name = "Mohammad";
        $mohamadbitariTranslation->last_name = "Bitari";
        $mohamadbitariTranslation->biography = <<<HEREDOC
        Mohamad Bitari és un poeta, traductor, escriptor i periodista palestí de Síria establert a Barcelona. Va néixer el 1990 al camp de refugiats palestins de Yarmouk a Síria, on va viure fins als vint-i-tres anys. La seva família va fugir de la ciutat de Natzaret el 1948 (any de la Nakba) i es va instal·lar a Síria després de l'ocupació del nou Estat d'Israel a Palestina.  Bitari és fundador d'Èter Edicions, especialitzada en traduccions de l'àrab al català i viceversa. Forma part del Comitè d'Escriptors Perseguits de la Fundació Pen Club a Catalunya, i treballa com a traductor de literatura catalana i literatura espanyola; també imparteix classes d'àrab a la Universitat Autònoma de Barcelona i col·labora habitualment amb institucions culturals per establir ponts entre Catalunya i el mon àrab. Ha traduït a l'àrab autors com ara Federico García Lorca, Rafael Alberti, Miguel Hernández, Tomas Cohen i Miquel Martí i Pol. És autor de Jo soc vosaltres, sis poetes de Síria (2019), una versió bilingüe en àrab-català amb traducció de Margarida Castells i Criballés, en col·laboració amb les editorials Polen i Godall i la fundació Sodepau.
        HEREDOC;
        $mohamadbitariTranslation->slug = "mohammad-bitari";
        $mohamadbitariTranslation->meta_title = $mohamadbitariTranslation->first_name . " " . $mohamadbitariTranslation->last_name;
        $mohamadbitariTranslation->meta_description = $mohamadbitariTranslation->biography;
        $mohamadbitariTranslation->save();

        $mohamadbitariTranslationEs = new CollaboratorTranslation();
        $mohamadbitariTranslationEs->collaborator_id = $mohamadbitari->id;
        $mohamadbitariTranslationEs->lang = "es";
        $mohamadbitariTranslationEs->first_name = "Mohammad";
        $mohamadbitariTranslationEs->last_name = "Bitari";
        $mohamadbitariTranslationEs->biography = <<<HEREDOC
        Mohamad Bitari es un poeta, traductor, escritor y periodista palestino de Siria, establecido en Barcelona. Nació en el 1990 en el campo de refugiados palestinos de Yarmouk, en Siria, donde vivió hasta los ventitrés años. Su familia huyó de la ciudad de Nazareth en 1948 (año de la Nakba) y se instaló en Siria después de la ocupación del nuevo Estado de Israel en Palestina.  Bitari es fundador de Èter Edicions, especializada en traducciones del árabe al catalán y viceversa. Forma parte del Comité de Escritores Perseguidos de la Fundación Pen Club de Catalunya, y trabaja como traductor de literatura catalana y literatura española; también imparte clases de árabe en la Universitat Autònoma de Barcelona y colabora habitualmente con instituciones culturales para establecer puentes entre Catalunya y el mundo árabe. Ha traducido al árabe autores como Federico García Lorca, Rafael Alberti, Miguel Hernández, Tomas Cohen y Miquel Martí i Pol. Es autor de Jo soc vosaltres, sis poetes de Síria (2019), una versión bilingüe en árabe y catalán con traducción de Margarida Castells i Criballés, en colaboración con las editoriales Polen i Godall y la fundación Sodepau.
        HEREDOC;
        $mohamadbitariTranslationEs->slug = "mohammad-bitari";
        $mohamadbitariTranslationEs->meta_title = $mohamadbitariTranslationEs->first_name . " " . $mohamadbitariTranslationEs->last_name;
        $mohamadbitariTranslationEs->meta_description = $mohamadbitariTranslationEs->biography;
        $mohamadbitariTranslationEs->save();


        // 3- Ismael Profitós
        $ismaelprofitos = new Collaborator();
        $ismaelprofitos->image = "default.webp";
        $ismaelprofitos->social_networks = '{"linkedin": "https://es.linkedin.com/in/ismael-profit%C3%B3s-9a9284145"}';
        $ismaelprofitos->save();

        $ismaelprofitosTranslation = new CollaboratorTranslation();
        $ismaelprofitosTranslation->collaborator_id = $ismaelprofitos->id;
        $ismaelprofitosTranslation->lang = "ca";
        $ismaelprofitosTranslation->first_name = "Ismael";
        $ismaelprofitosTranslation->last_name = "Profitós";
        $ismaelprofitosTranslation->biography = <<<HEREDOC
        Ho sentim! Aquesta biografia no està disponible actualment.
        HEREDOC;
        $ismaelprofitosTranslation->slug = "ismael-profitos";
        $ismaelprofitosTranslation->meta_title = $ismaelprofitosTranslation->first_name . " " . $ismaelprofitosTranslation->last_name;
        $ismaelprofitosTranslation->meta_description = $ismaelprofitosTranslation->biography;
        $ismaelprofitosTranslation->save();

        $ismaelprofitosTranslationEs = new CollaboratorTranslation();
        $ismaelprofitosTranslationEs->collaborator_id = $ismaelprofitos->id;
        $ismaelprofitosTranslationEs->lang = "es";
        $ismaelprofitosTranslationEs->first_name = "Ismael";
        $ismaelprofitosTranslationEs->last_name = "Profitós";
        $ismaelprofitosTranslationEs->biography = <<<HEREDOC
        ¡Lo sentimos! Esta biografía no está disponible actualmente.
        HEREDOC;
        $ismaelprofitosTranslationEs->slug = "ismael-profitos";
        $ismaelprofitosTranslationEs->meta_title = $ismaelprofitosTranslation->first_name . " " . $ismaelprofitosTranslation->last_name;
        $ismaelprofitosTranslationEs->meta_description = $ismaelprofitosTranslation->biography;
        $ismaelprofitosTranslationEs->save();



        // 4- Margarida Castells
        $margaridacastells = new Collaborator();
        $margaridacastells->image = "margarida-castells.webp";
        $margaridacastells->social_networks = '{"wikipedia": "https://ca.wikipedia.org/wiki/Margarida_Castells_i_Criball%C3%A9s"}';
        $margaridacastells->save();

        $margaridacastellsTranslation = new CollaboratorTranslation();
        $margaridacastellsTranslation->collaborator_id = $margaridacastells->id;
        $margaridacastellsTranslation->lang = "ca";
        $margaridacastellsTranslation->first_name = "Margarida";
        $margaridacastellsTranslation->last_name = "Castells";
        $margaridacastellsTranslation->biography = <<<HEREDOC
        Margarida Castells i Criballés (Torelló, 1962) és traductora de l'àrab, investigadora i professora Coautora amb Dolors Cinca de dues versions dels reculls d'històries de Les mil i una nits (Premi Ciutat de Barcelona de traducció en llengua catalana - 1996 i Premi Crítica Serra d'Or de traducció - 1997). En col·laboració amb Manuel Forcano va traduir els relats de viatges d'Ibn Battuta (2005 - Premi Crítica Serra d'Or de traducció 2006), i, en solitari, textos de Salim Barakat, i Mahmud Darwix entre d'altres.
        Ha estat docent a la Universitat de Barcelona, i s'ha dedicat a les traduccions llatines de l'Alcorà i a la codicologia. Ha col·laborat amb el Museu Egipci de Barcelona (Fundació Arqueològica Clos) com a directora científica d'expedicions culturals a Etiòpia i a l'Uzbekistan. També ha format part de diverses expedicions de catalogació i conservació de manuscrits als països de l'àrea mediterrània. Com a filòloga i arabista és coautora, amb Dolors Cinca, del primer Diccionari àrab-català, que té per objecte l'àrab estàndard modern.
        HEREDOC;
        $margaridacastellsTranslation->slug = "margarida-castells";
        $margaridacastellsTranslation->meta_title = $margaridacastellsTranslation->first_name . " " . $margaridacastellsTranslation->last_name;
        $margaridacastellsTranslation->meta_description = $margaridacastellsTranslation->biography;
        $margaridacastellsTranslation->save();

        $margaridacastellsTranslationEs = new CollaboratorTranslation();
        $margaridacastellsTranslationEs->collaborator_id = $margaridacastells->id;
        $margaridacastellsTranslationEs->lang = "es";
        $margaridacastellsTranslationEs->first_name = "Margarida";
        $margaridacastellsTranslationEs->last_name = "Castells";
        $margaridacastellsTranslationEs->biography = <<<HEREDOC
        Margarida Castells i Criballés (Torelló, 1962) es traductora del árabe, investigadora y profesora. En colaboración con Dolors Cinca, fue coautora de dos versiones de recopilaciones de historias de Las mil y una noches (Premio Ciudad de Barcelona de traducción en lengua catalana - 1996 y Premio Crítica Serra d'Or de traducción - 1997). Junto con Manuel Forcano, tradujo los relatos de viajes de Ibn Battuta (2005 - Premio Crítica Serra d'Or de traducción 2006), y, en solitario, textos de Salim Barakat, y Mahmud Darwix, entre otros.
        Ha sido docente en la Universidad de Barcelona y se ha dedicado a las traducciones latinas del Corán y a la codicología. Ha colaborado con el Museo Egipcio de Barcelona (Fundación Arqueológica Clos) como directora científica de expediciones culturales a Etiopía y Uzbekistán. También ha formado parte de diversas expediciones de catalogación y conservación de manuscritos en los países del área mediterránea. Como filóloga y arabista, es coautora, junto con Dolors Cinca, del primer Diccionario árabe-catalán, que tiene por objeto el árabe estándar moderno.
        HEREDOC;
        $margaridacastellsTranslationEs->slug = "margarida-castells";
        $margaridacastellsTranslationEs->meta_title = $margaridacastellsTranslationEs->first_name . " " . $margaridacastellsTranslationEs->last_name;
        $margaridacastellsTranslationEs->meta_description = $margaridacastellsTranslationEs->biography;
        $margaridacastellsTranslationEs->save();


        // 5- Rammi Abbas
        $rammiabbas = new Collaborator();
        $rammiabbas->image = "default.webp";
        $rammiabbas->social_networks = '{"facebook": "https://www.facebook.com/rami.abbas.902/", "twitter": "https://twitter.com/RamiAbbas48"}';
        $rammiabbas->save();

        $rammiabbasTranslation = new CollaboratorTranslation();
        $rammiabbasTranslation->collaborator_id = $rammiabbas->id;
        $rammiabbasTranslation->lang = "ca";
        $rammiabbasTranslation->first_name = "Rammi";
        $rammiabbasTranslation->last_name = "Abbas";
        $rammiabbasTranslation->biography = <<<HEREDOC
        Ho sentim! Aquesta biografia no està disponible actualment.
        HEREDOC;
        $rammiabbasTranslation->slug = "rammi-abbas";
        $rammiabbasTranslation->meta_title = $rammiabbasTranslation->first_name . " " . $rammiabbasTranslation->last_name;
        $rammiabbasTranslation->meta_description = $rammiabbasTranslation->biography;
        $rammiabbasTranslation->save();

        $rammiabbasTranslationEs = new CollaboratorTranslation();
        $rammiabbasTranslationEs->collaborator_id = $rammiabbas->id;
        $rammiabbasTranslationEs->lang = "es";
        $rammiabbasTranslationEs->first_name = "Rammi";
        $rammiabbasTranslationEs->last_name = "Abbas";
        $rammiabbasTranslationEs->biography = <<<HEREDOC
        ¡Lo sentimos! Esta biografía no está disponible actualmente.
        HEREDOC;
        $rammiabbasTranslationEs->slug = "rammi-abbas";
        $rammiabbasTranslationEs->meta_title = $rammiabbasTranslationEs->first_name . " " . $rammiabbasTranslationEs->last_name;
        $rammiabbasTranslationEs->meta_description = $rammiabbasTranslationEs->biography;
        $rammiabbasTranslationEs->save();

        // 6- Rasha Omran
        $rashaomran = new Collaborator();
        $rashaomran->image = "rasha-omran.webp";
        $rashaomran->social_networks = '{}';
        $rashaomran->save();

        $rashaomranTranslation = new CollaboratorTranslation();
        $rashaomranTranslation->collaborator_id = $rashaomran->id;
        $rashaomranTranslation->lang = "ca";
        $rashaomranTranslation->first_name = "Rasha";
        $rashaomranTranslation->last_name = "Omran";
        $rashaomranTranslation->biography = <<<HEREDOC
        Rasha Omran (1964) és llicenciada en Literatura Àrab per la Universitat de Damasc. Ha estat directora del Festival de Cultura al-Sindiyan. És autora de set poemaris i una antologia de poesia siriana, publicada l’any 2008.
        Crítica pública del règim d’El Assad, contra el qual s’ha manifestat en entrevistes i articles, es va exiliar al Caire el 2012, després d’amenaces de la dictadura contra ella i la seva família.
        Omran ha estat considerada, per la seva aposta estilística. la juntura entre la generació clàssica i les noves generacions en la poesia de Síria.
        HEREDOC;
        $rashaomranTranslation->slug = "rasha-omran";
        $rashaomranTranslation->meta_title = $rashaomranTranslation->first_name . " " . $rashaomranTranslation->last_name;
        $rashaomranTranslation->meta_description = $rashaomranTranslation->biography;
        $rashaomranTranslation->save();

        $rashaomranTranslationEs = new CollaboratorTranslation();
        $rashaomranTranslationEs->collaborator_id = $rashaomran->id;
        $rashaomranTranslationEs->lang = "es";
        $rashaomranTranslationEs->first_name = "Rasha";
        $rashaomranTranslationEs->last_name = "Omran";
        $rashaomranTranslationEs->biography = <<<HEREDOC
        Rasha Omran (1964) es licenciada en Literatura Árabe por la Universidad de Damasco. Ha sido directora del Festival de Cultura al-Sindiyan. Es autora de siete poemarios y una antología de poesía siria, publicada en el año 2008.
        Crítica pública del régimen de El Assad, contra el cual se ha manifestado en entrevistas y artículos, se exilió en El Cairo en 2012, tras amenazas de la dictadura contra ella y su familia.
        Omran ha sido considerada, por su apuesta estilística, el punto de encuentro entre la generación clásica y las nuevas generaciones en la poesía de Siria.
        HEREDOC;
        $rashaomranTranslationEs->slug = "rasha-omran";
        $rashaomranTranslationEs->meta_title = $rashaomranTranslationEs->first_name . " " . $rashaomranTranslationEs->last_name;
        $rashaomranTranslationEs->meta_description = $rashaomranTranslationEs->biography;
        $rashaomranTranslationEs->save();

        // 7- Pontus Sánchez
        $pontussanchez = new Collaborator();
        $pontussanchez->image = "default.webp";
        $pontussanchez->social_networks = '{}';
        $pontussanchez->save();

        $pontussanchezTranslation = new CollaboratorTranslation();
        $pontussanchezTranslation->collaborator_id = $pontussanchez->id;
        $pontussanchezTranslation->lang = "ca";
        $pontussanchezTranslation->first_name = "Pontus";
        $pontussanchezTranslation->last_name = "Sánchez";
        $pontussanchezTranslation->biography = <<<HEREDOC
        Ho sentim! Aquesta biografia no està disponible actualment.
        HEREDOC;
        $pontussanchezTranslation->slug = "pontus-sanchez";
        $pontussanchezTranslation->meta_title = $pontussanchezTranslation->first_name . " " . $pontussanchezTranslation->last_name;
        $pontussanchezTranslation->meta_description = $pontussanchezTranslation->biography;
        $pontussanchezTranslation->save();

        $pontussanchezTranslationEs = new CollaboratorTranslation();
        $pontussanchezTranslationEs->collaborator_id = $pontussanchez->id;
        $pontussanchezTranslationEs->lang = "es";
        $pontussanchezTranslationEs->first_name = "Pontus";
        $pontussanchezTranslationEs->last_name = "Sánchez";
        $pontussanchezTranslationEs->biography = <<<HEREDOC
        ¡Lo sentimos! Esta biografía no está disponible actualmente.
        HEREDOC;
        $pontussanchezTranslationEs->slug = "pontus-sanchez";
        $pontussanchezTranslationEs->meta_title = $pontussanchezTranslationEs->first_name . " " . $pontussanchezTranslationEs->last_name;
        $pontussanchezTranslationEs->meta_description = $pontussanchezTranslationEs->biography;
        $pontussanchezTranslationEs->save();

        // 8- Oriol Rissech
        $oriolrissech = new Collaborator();
        $oriolrissech->image = "default.webp";
        $oriolrissech->social_networks = '{"instagram": "https://www.instagram.com/reginald_langsham", "facebook": "https://es-es.facebook.com/oriol.gasulla/"}';
        $oriolrissech->save();

        $oriolrissechTranslation = new CollaboratorTranslation();
        $oriolrissechTranslation->collaborator_id = $oriolrissech->id;
        $oriolrissechTranslation->lang = "ca";
        $oriolrissechTranslation->first_name = "Oriol";
        $oriolrissechTranslation->last_name = "Rissech";
        $oriolrissechTranslation->biography = <<<HEREDOC
        Ho sentim! Aquesta biografia no està disponible actualment.
        HEREDOC;
        $oriolrissechTranslation->slug = "oriol-rissech";
        $oriolrissechTranslation->meta_title = $oriolrissechTranslation->first_name . " " . $oriolrissechTranslation->last_name;
        $oriolrissechTranslation->meta_description = $oriolrissechTranslation->biography;
        $oriolrissechTranslation->save();

        $oriolrissechTranslationEs = new CollaboratorTranslation();
        $oriolrissechTranslationEs->collaborator_id = $oriolrissech->id;
        $oriolrissechTranslationEs->lang = "es";
        $oriolrissechTranslationEs->first_name = "Oriol";
        $oriolrissechTranslationEs->last_name = "Rissech";
        $oriolrissechTranslationEs->biography = <<<HEREDOC
        ¡Lo sentimos! Esta biografía no está disponible actualmente.
        HEREDOC;
        $oriolrissechTranslationEs->slug = "oriol-rissech";
        $oriolrissechTranslationEs->meta_title = $oriolrissechTranslationEs->first_name . " " . $oriolrissechTranslationEs->last_name;
        $oriolrissechTranslationEs->meta_description = $oriolrissechTranslationEs->biography;
        $oriolrissechTranslationEs->save();


        // 9- Elisabeth Hultcrantz
        $elisabethhultcrantz = new Collaborator();
        $elisabethhultcrantz->image = "elisabeth-hultcrantz.webp";
        $elisabethhultcrantz->social_networks = '{}';
        $elisabethhultcrantz->save();

        $elisabethhultcrantzTranslation = new CollaboratorTranslation();
        $elisabethhultcrantzTranslation->collaborator_id = $elisabethhultcrantz->id;
        $elisabethhultcrantzTranslation->lang = "ca";
        $elisabethhultcrantzTranslation->first_name = "Elisabeth";
        $elisabethhultcrantzTranslation->last_name = "Hultcrantz";
        $elisabethhultcrantzTranslation->biography = <<<HEREDOC
        Elisabeth Hultcrantz (1942) és professora Sènior en otorrinolaringologia. Des del 2008, i través de Metges del Món (MdM), ha estat treballant amb nens refugiats, i en concret amb infants afectats de la síndrome de resignació.

        És autora de nombrosos articles, pels quals ha guanyat el Primer Premi d’Assaig de l’Associació de Psicologia mèdica. Així mateix, és l’editora d’un llibre sobre metgesses acadèmiques, i ha participat en la biografia de la doctora Gussander.
        HEREDOC;
        $elisabethhultcrantzTranslation->slug = "elisabeth-hultcrantz";
        $elisabethhultcrantzTranslation->meta_title = $elisabethhultcrantzTranslation->first_name . " " . $elisabethhultcrantzTranslation->last_name;
        $elisabethhultcrantzTranslation->meta_description = $elisabethhultcrantzTranslation->biography;
        $elisabethhultcrantzTranslation->save();

        $elisabethhultcrantzTranslationEs = new CollaboratorTranslation();
        $elisabethhultcrantzTranslationEs->collaborator_id = $elisabethhultcrantz->id;
        $elisabethhultcrantzTranslationEs->lang = "es";
        $elisabethhultcrantzTranslationEs->first_name = "Elisabeth";
        $elisabethhultcrantzTranslationEs->last_name = "Hultcrantz";
        $elisabethhultcrantzTranslationEs->biography = <<<HEREDOC
        Elisabeth Hultcrantz (1942) es profesora Sénior en otorrinolaringología. Desde 2008, a través de Médicos del Mundo (MdM), ha estado trabajando con niños refugiados, en concreto, con niños afectados por el síndrome de resignación.
        Es autora de numerosos artículos, por los cuales ha ganado el Primer Premio de Ensayo de la Asociación de Psicología Médica. Asimismo, es la editora de un libro sobre médicas académicas y ha participado en la biografía de la doctora Gussander.
        HEREDOC;
        $elisabethhultcrantzTranslationEs->slug = "elisabeth-hultcrantz";
        $elisabethhultcrantzTranslationEs->meta_title = $elisabethhultcrantzTranslationEs->first_name . " " . $elisabethhultcrantzTranslationEs->last_name;
        $elisabethhultcrantzTranslationEs->meta_description = $elisabethhultcrantzTranslationEs->biography;
        $elisabethhultcrantzTranslationEs->save();


        // 10- Sàdiq Jalal al-Àzem
        $sadiqjalalalazem = new Collaborator();
        $sadiqjalalalazem->image = "sadiq-jalal-al-azem.webp";
        $sadiqjalalalazem->social_networks = '{}';
        $sadiqjalalalazem->save();

        $sadiqjalalalazemTranslation = new CollaboratorTranslation();
        $sadiqjalalalazemTranslation->collaborator_id = $sadiqjalalalazem->id;
        $sadiqjalalalazemTranslation->lang = "ca";
        $sadiqjalalalazemTranslation->first_name = "Sàdiq Jalal";
        $sadiqjalalalazemTranslation->last_name = "al-Àzem";
        $sadiqjalalalazemTranslation->biography = <<<HEREDOC
        Sàdiq Jalal al-Àzem (Damasc, 1934 – Berlín, 2016) fou un dels representants més destacats del pensament marxis ta, nacionalista i laic al món àrab contemporani, i també un conegut defensor de la democràcia, dels drets humans i de la llibertat d’expressió. La redacció d’Orientalisme invers li valgué la fi de l’amistat amb Edward W. Said.
        HEREDOC;
        $sadiqjalalalazemTranslation->slug = "sadiq-jalal-al-azem";
        $sadiqjalalalazemTranslation->meta_title = $sadiqjalalalazemTranslation->first_name . " " . $sadiqjalalalazemTranslation->last_name;
        $sadiqjalalalazemTranslation->meta_description = $sadiqjalalalazemTranslation->biography;
        $sadiqjalalalazemTranslation->save();

        $sadiqjalalalazemTranslationEs = new CollaboratorTranslation();
        $sadiqjalalalazemTranslationEs->collaborator_id = $sadiqjalalalazem->id;
        $sadiqjalalalazemTranslationEs->lang = "es";
        $sadiqjalalalazemTranslationEs->first_name = "Sadiq Jalal";
        $sadiqjalalalazemTranslationEs->last_name = "al-Azm";
        $sadiqjalalalazemTranslationEs->biography = <<<HEREDOC
        Sadiq Jalal al-Azm (Damasco, 1934 - Berlín, 2016) fue uno de los representantes más destacados del pensamiento marxista, nacionalista y laico en el mundo árabe contemporáneo, y también un conocido defensor de la democracia, los derechos humanos y la libertad de expresión. La redacción de Orientalismo inverso le valió el fin de la amistad con Edward W. Said.
        HEREDOC;
        $sadiqjalalalazemTranslationEs->slug = "sadiq-jalal-al-azem";
        $sadiqjalalalazemTranslationEs->meta_title = $sadiqjalalalazemTranslationEs->first_name . " " . $sadiqjalalalazemTranslationEs->last_name;
        $sadiqjalalalazemTranslationEs->meta_description = $sadiqjalalalazemTranslationEs->biography;
        $sadiqjalalalazemTranslationEs->save();


        // 11- Sélim Nassib
        $selimnassib = new Collaborator();
        $selimnassib->image = "selim-nassib.webp";
        $selimnassib->social_networks = '{}';
        $selimnassib->save();

        $selimnassibTranslation = new CollaboratorTranslation();
        $selimnassibTranslation->collaborator_id = $selimnassib->id;
        $selimnassibTranslation->lang = "ca";
        $selimnassibTranslation->first_name = "Sélim";
        $selimnassibTranslation->last_name = "Nassib";
        $selimnassibTranslation->biography = <<<HEREDOC
        Sélim Nassib (Beirut, 1946) és un escriptor i periodista libanès. Va exercir com a corresponsal al Pròxim Orient pel mitjà francès Libération. Des del 1990, s’ha dedicat plenament a l’escriptura, tant a l’assaig periodístic com a la narrativa de ficció. És autor dels llibres de relats ‘L’home assegut’ (Balland, 1990) i ‘Un vespre a Beirut’ (Thierry Magnier, 2007); de les novel·les ‘El boig de Beirut’ (Balland, 1992), ‘Clandestí’ (Balland, 1998) i ‘L’aldarull’ (Éditions de l’Olivier, 2022). Ha treballat, igualment, com a coguionista a ‘Els guants d’or d’Akka’ (1992) i a ‘Would you have sex with an Arab?’ (2012). Com a assagista, ha destacat amb ‘Oum’ (Balland, 1994), amb ‘Un amant a Palestina (Robert Laffont, 2004) i amb ‘La insubmisa de Gaza’ (2016).
        HEREDOC;
        $selimnassibTranslation->slug = "selim-nassib";
        $selimnassibTranslation->meta_title = $selimnassibTranslation->first_name . " " . $selimnassibTranslation->last_name;
        $selimnassibTranslation->meta_description = $selimnassibTranslation->biography;
        $selimnassibTranslation->save();

        $selimnassibTranslationEs = new CollaboratorTranslation();
        $selimnassibTranslationEs->collaborator_id = $selimnassib->id;
        $selimnassibTranslationEs->lang = "es";
        $selimnassibTranslationEs->first_name = "Sélim";
        $selimnassibTranslationEs->last_name = "Nassib";
        $selimnassibTranslationEs->biography = <<<HEREDOC
        Sélim Nassib (Beirut, 1946) es un escritor y periodista libanés. Ejerció como corresponsal en el Próximo Oriente para el medio francés Libération. Desde 1990, se ha dedicado plenamente a la escritura, tanto al ensayo periodístico como a la narrativa de ficción. Es autor de los libros de relatos 'El hombre sentado' (Balland, 1990) y 'Una tarde en Beirut' (Thierry Magnier, 2007); de las novelas 'El loco de Beirut' (Balland, 1992), 'Clandestino' (Balland, 1998) y 'La algarabía' (Éditions de l'Olivier, 2022). Ha trabajado también como coguionista en 'Los guantes de oro de Akka' (1992) y en 'Would you have sex with an Arab?' (2012). Como ensayista, ha destacado con 'Oum' (Balland, 1994), con 'Un amante en Palestina' (Robert Laffont, 2004) y con 'La insubmisa de Gaza' (2016).
        HEREDOC;
        $selimnassibTranslationEs->slug = "selim-nassib";
        $selimnassibTranslationEs->meta_title = $selimnassibTranslationEs->first_name . " " . $selimnassibTranslationEs->last_name;
        $selimnassibTranslationEs->meta_description = $selimnassibTranslationEs->biography;
        $selimnassibTranslationEs->save();

        // 12- Asmaa Alghoul
        $asmaaalghoul = new Collaborator();
        $asmaaalghoul->image = "asmaa-alghoul.webp";
        $asmaaalghoul->social_networks = '{}';
        $asmaaalghoul->save();

        $asmaaalghoulTranslation = new CollaboratorTranslation();
        $asmaaalghoulTranslation->collaborator_id = $asmaaalghoul->id;
        $asmaaalghoulTranslation->lang = "ca";
        $asmaaalghoulTranslation->first_name = "Asmaa";
        $asmaaalghoulTranslation->last_name = "Alghoul";
        $asmaaalghoulTranslation->biography = <<<HEREDOC
        Asmaa Alghoul (Rafah, 1982) és una periodista i escriptora palestina. Ha treballat en mitjans com Al-Ayyam, Al-Monitor i la Fundació Samir Kassir. És autora del llibre de relats ‘Separació sobre quadre negre’ (2006). Va fundar, el 2010, amb altres col·laboradors, el moviment liberal i secular «Isha!» (‘Desperta’t!).
        Per la seva activitat periodística i militant, ha rebut els premis Hellman-Hammet de Human Rights Watch (2010) i Valor en el Periodisme per la International Women's Media Foundation (2012), a més del Premi de Literatura Juvenil Palestina (2000).
        Des del 2016, i degut a la seva oposició frontal a Hamàs, viu a França, on ha continuat amb la seva activitat a diversos mitjans de comunicació.
        HEREDOC;
        $asmaaalghoulTranslation->slug = "asmaa-alghoul";
        $asmaaalghoulTranslation->meta_title = $asmaaalghoulTranslation->first_name . " " . $asmaaalghoulTranslation->last_name;
        $asmaaalghoulTranslation->meta_description = $asmaaalghoulTranslation->biography;
        $asmaaalghoulTranslation->save();

        $asmaaalghoulTranslationEs = new CollaboratorTranslation();
        $asmaaalghoulTranslationEs->collaborator_id = $asmaaalghoul->id;
        $asmaaalghoulTranslationEs->lang = "es";
        $asmaaalghoulTranslationEs->first_name = "Asmaa";
        $asmaaalghoulTranslationEs->last_name = "Alghoul";
        $asmaaalghoulTranslationEs->biography = <<<HEREDOC
        Asmaa Alghoul (Rafah, 1982) es una periodista y escritora palestina. Ha trabajado en medios como Al-Ayyam, Al-Monitor y la Fundación Samir Kassir. Es autora del libro de relatos 'Separación sobre pizarra negra' (2006). Fundó en 2010, junto con otros colaboradores, el movimiento liberal y secular "¡Isha!" ('¡Despierta!').
        Por su actividad periodística y militante, ha recibido los premios Hellman-Hammet de Human Rights Watch (2010) y Valor en el Periodismo por la International Women's Media Foundation (2012), además del Premio de Literatura Juvenil Palestina (2000).
        Desde 2016, y debido a su oposición frontal a Hamás, vive en Francia, donde ha continuado con su actividad en varios medios de comunicación.
        HEREDOC;
        $asmaaalghoulTranslationEs->slug = "asmaa-alghoul";
        $asmaaalghoulTranslationEs->meta_title = $asmaaalghoulTranslationEs->first_name . " " . $asmaaalghoulTranslationEs->last_name;
        $asmaaalghoulTranslationEs->meta_description = $asmaaalghoulTranslationEs->biography;
        $asmaaalghoulTranslationEs->save();
    }
}
