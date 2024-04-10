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
        //Majd Kayyal
        $majdkayyal = new Collaborator();
        $majdkayyal->image = "collab-1.webp";
        $majdkayyal->social_networks = '{"instagram": "https://www.instagram.com/majdkayyal/"}';
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


        //Moha
        $mohamadbitari = new Collaborator();
        $mohamadbitari->image = "collab-2.webp";
        $mohamadbitari->social_networks = '{"instagram": "https://www.instagram.com/mohammadbitari/"}';
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


        //Ismael Profitós
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

        //Margarida Castells
        $margaridacastells = new Collaborator();
        $margaridacastells->image = "collab-3.webp";
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


        //Rammi Abbas
        $rammiabbas = new Collaborator();
        $rammiabbas->image = "collab-1.webp";
        $rammiabbas->social_networks = '{"linkedin": "https://es.linkedin.com/in/rami-abbas-144b0173"}';
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
    }
}
