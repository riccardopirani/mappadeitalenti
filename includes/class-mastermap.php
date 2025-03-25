<?php

namespace map_plugin;
class Mastermap
{
    const VERSIONE = "1.0";

    function __construct()
    {
        add_action("init", [$this, "handle_map_registration"]);
    }

    public function form_mappa_talenti($slug_mappa = "", $lingua = "")
    {
        if ($lingua == "EN"):
            $form =
                '<form id="f_mappa_talenti" action="' .
                $_SERVER["REQUEST_URI"] .
                '" method="post" onsubmit="return handleSubmit();">';
            $form .= "<p><b>*</b> Fill in the required fields</p>";

            $form .=
                '<input type="hidden" name="slug_mappa" value="' .
                esc_attr($slug_mappa) .
                '">';
            $form .=
                '<input type="hidden" name="lingua" value="' .
                esc_attr($lingua) .
                '">';
            $form .= '<div class="row reg-row my-1">';
            $form .= '<div class="col-md-3 mb-2">';
            $form .= '<label for="nome">Name*</label>';
            $form .=
                '<input class="form-control" type="text" name="nome" required placeholder="Nome*">';
            $form .= "</div>";
            $form .= '<div class="col-md-3 mb-2">';
            $form .= '<label for="cognome">Last Name*</label>';
            $form .=
                '<input class="form-control" type="text" name="cognome" required placeholder="Cognome*">';
            $form .= "</div>";
            $form .= '<div class="col-md-3 mb-2">';
            $form .= '<label for="email">E-mail*</label>';
            $form .=
                '<input class="form-control" type="email" name="email" required placeholder="E-mail*">';
            $form .= "</div>";
            $form .= '<div class="col-md-3 mb-2">';
            $form .= '<label for="sesso">Gender*</label>';
            $form .= '<div class="form-check form-check-inline">';
            $form .=
                '<input class="form-check-input" type="radio" name="sesso" id="uomo" value="uomo" required>';
            $form .= '<label class="form-check-label" for="uomo">Male</label>';
            $form .= "</div>";
            $form .= '<div class="form-check form-check-inline">';
            $form .=
                '<input class="form-check-input" type="radio" name="sesso" id="donna" value="donna" required>';
            $form .=
                '<label class="form-check-label" for="donna">Female</label>';
            $form .= "</div>";
            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_nascita_utente">Your date of birth*</label>';

            $form .=
                '<input class="form-control" type="text" id="data_di_nascita_utente" name="data_di_nascita_utente" required >';

            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_madre">Your mother\'s date of birth</label>';
            $form .=
                '<input class="form-control" type="text"  id="data_di_nascita_madre" name="data_di_nascita_madre" required >';
            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_padre">Your father\'s date of birth</label>';
            $form .=
                '<input class="form-control" type="text" id="data_di_nascita_padre" name="data_di_nascita_padre" required >';
            $form .= "</div>";
            $form .= '<div class="col-md-12 mb-2 ps-5 form-check">';
            $form .=
                '<input class="form-check-input" type="checkbox" name="accettazione_privacy" required>';
            $form .=
                ' <label class="form-check-label" for="accettazione_privacy">I have read the <a href="#">privacy policy</a> and I consent to the storage of my data, in accordance with the European regulation on personal data protection no. 679/2016 (GDPR)*</label>';
            $form .= "</div>";
            $form .= '<div class="col-md-12 mb-2">';
            $form .=
                '<input type="submit" name="book" value="SEND" class="btn btn-primary"/>';
            $form .= "</div>";
            $form .= "</div>";
            $form .= "</form>";
        else:
            $form =
                '<form id="f_mappa_talenti" action="' .
                $_SERVER["REQUEST_URI"] .
                '" method="post" onsubmit="return handleSubmit();">';
            $form .= "<p><b>*</b> Compila i campi richiesti</p>";

            $form .=
                '<input type="hidden" name="slug_mappa" value="' .
                esc_attr($slug_mappa) .
                '">';
            $form .=
                '<input type="hidden" name="lingua" value="' .
                esc_attr($lingua) .
                '">';
            $form .= '<div class="row reg-row my-1">';
            $form .= '<div class="col-md-3 mb-2">';
            $form .=
                '<label for="nome">' . __("Nome", "ek_mappa") . "*</label>";
            $form .=
                '<input class="form-control" type="text" name="nome" required placeholder="Nome*">';
            $form .= "</div>";
            $form .= '<div class="col-md-3 mb-2">';
            $form .=
                '<label for="cognome">' .
                __("Cognome", "ek_mappa") .
                "*</label>";
            $form .=
                '<input class="form-control" type="text" name="cognome" required placeholder="Cognome*">';
            $form .= "</div>";
            $form .= '<div class="col-md-3 mb-2">';
            $form .=
                '<label for="email">' . __("E-mail", "ek_mappa") . "*</label>";
            $form .=
                '<input class="form-control" type="email" name="email" required placeholder="E-mail*">';
            $form .= "</div>";
            $form .= '<div class="col-md-3 mb-2">';
            $form .=
                '<label for="sesso">' . __("Sesso", "ek_mappa") . "*</label>";
            $form .= '<div class="form-check form-check-inline">';
            $form .=
                '<input class="form-check-input" type="radio" name="sesso" id="uomo" value="uomo" required>';
            $form .=
                '<label class="form-check-label" for="uomo">' .
                __("Uomo", "ek_mappa") .
                "</label>";
            $form .= "</div>";
            $form .= '<div class="form-check form-check-inline">';
            $form .=
                '<input class="form-check-input" type="radio" name="sesso" id="donna" value="donna" required>';
            $form .=
                '<label class="form-check-label" for="donna">' .
                __("Donna", "ek_mappa") .
                "</label>";
            $form .= "</div>";
            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_nascita_utente">' .
                __("La tua data di nascita", "ek_mappa") .
                "*</label>";
            $form .=
                '<input class="form-control" type="text" id="data_di_nascita_utente" name="data_di_nascita_utente" required >';

            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_madre">' .
                __("Data di nascita di tua madre", "ek_mappa") .
                "</label>";
            $form .=
                '<input class="form-control" type="text"  id="data_di_nascita_madre" name="data_di_nascita_madre" required>';
            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_padre">' .
                __("Data di nascita di tuo padre", "ek_mappa") .
                "</label>";
            $form .=
                '<input class="form-control" type="text" id="data_di_nascita_padre" name="data_di_nascita_padre" required>';
            $form .= "</div>";
            $form .= '<div class="col-md-12 mb-2 ps-5 form-check">';
            $form .=
                '<input class="form-check-input" type="checkbox" name="accettazione_privacy" required>';
            $form .=
                ' <label class="form-check-label" for="accettazione_privacy">Ho letto l\'<a href="#">informativa sulla privacy</a> e acconsento alla memorizzazione dei miei dati, secondo quanto stabilito dal regolamento europeo per la protezione dei dati personali n. 679/2016 (GDPR)*</label>';
            $form .= "</div>";
            $form .= '<div class="col-md-12 mb-2">';
            $form .=
                '<input type="submit" name="book" value="' .
                __("INVIA", "ek_mappa") .
                '" class="btn btn-primary"/>';
            $form .= "</div>";
            $form .= "</div>";
            $form .= "</form>";
        endif;

        $form .= "<script>";
        $form .= "function handleSubmit() {";
        $form .=
            '    var submitButton = document.getElementById("submit_button");';
        $form .= "    submitButton.disabled = true;";
        $form .= '    submitButton.value = "Invio in corso...";';
        $form .= "    return true;";
        $form .= "}";

        $form .= "function addDateSlashes(inputId) {";
        $form .=
            '    document.getElementById(inputId).addEventListener("input", function(e) {';
        $form .= "        var value = e.target.value;";
        $form .= '        value = value.replace(/\D/g, "");';

        $form .= "        if (value.length > 2 && value.length <= 4) {";
        $form .= '            value = value.slice(0, 2) + "/" + value.slice;';
        $form .= "        } else if (value.length > 4) {";
        $form .=
            '            value = value.slice(0, 2) + "/" + value.slice(2, 4) + "/" + value.slice(4, 8);';
        $form .= "        }";

        $form .= "        e.target.value = value;";
        $form .= "    });";
        $form .= "}";

        $form .= "</script>";
        return $form;
    }
    public function assegnare_valori(
        $solution,
        $slug_mappa,
        $sesso,
        $karmaNumber,
        $famiglianumber,
        $egonumber,
        $bisgognonumber,
        $puntodebolenumber,
        $missionenumber,
        $cuorenumber,
        $maestronumber,
        $maternanumber,
        $societanumber,
        $paternanumber,
        $riconoscimentonumber,
        $puntodiforzanumber
    ) {

            $mappatura_amore_uomo = [
            "KARMA" => [
                1 => "Fuoco: bisogno compulsivo del sesso/rifiuto del sesso. 
Il sesso è una delle forme d’espressione con la quale trasformiamo la rabbia. Dovrebbe essere un mezzo con la quale entriamo in comunicazione profonda con l’altro, ma in questo caso la difficoltà è proprio questa . Sia chi cerca compulsivamente il sesso, che chi lo rifiuta ha la difficoltà ad entrare in comunicazione profonda con l’altro in quanto in profondità c’è la rabbia.
Trasformazione: contattare la rabbia e iniziare a “sentire” veramente l’altro. 
Per aiutarti puoi usare il codice vibrazionale “Papa” o “Mama”. 
",
                2 => "Gelo: bisogno estremo di attenzioni. 
 Karmicamente c’è una parte di te che non è diventata emotivamente adulta e questo ti porta a entrare in relazione esprimendo bisogni che potrebbero risultare infantili, o se anche non li esprimi, farti valutare non soddisfacente una relazione per motivi infantili. Il risultato è che potresti vivere o relazioni dipendenti o evitare le relazioni per paura di non ricevere ciò che ritieni giusto",
                3 => "Anelli: attrai relazioni karmiche.
 con anime che hai dovuto/dovrai incontrare per apprendere una lezione importante. Gli incontri non sono evitabili, possono portarti a relazioni alleate o tossiche, ma lo svolgimento della relazione dipende dal tuo libero arbitrio. La cosa importante è che tu sappia che non sono relazioni che DEVONO restare nella tua vita. 
Trasformazione: accettare l’aspetto destinico di questo punto e sentirsi liberi nel proseguire la vita in libera scelta. 
Per aiutarti puoi usare il codice vibrazionale “Vision” o “Acept”.",
                4 => "SEME: Bisogno di sicurezza. Nella prima parte della vita potresti avere la tendenza a chiedere dimostrazioni d’amore continue non sentendoti mai appagat* pienamente. Questo nasce da un aspetto di profonda insicurezza rispetto la tua autostima. Avrai quindi la tendenza a far scappare le persone o, nel momento in cui riesci a conquistarne una, ad essere terrorizzat* di perderla accettando anche situazioni poco valorizzanti per te o diventando soffocante per l’altro. Trasformazione: contattare il senso del tuo valore e attrarre situazioni appaganti. Puoi aiutarti con il codice vibrazionale “Value” e “Initiation”.",
                5 => "Fiore: bisogno di attrarre.
 Nella prima parte della vita potresti avere continuamente bisogno di sentire che riesci ad attrarre altre persone. Potresti avere quindi la tendenza a flirtare anche quando il contesto non lo richiederebbe. Potresti attrarre anche chi non ti interessa veramente trovandoti incastrato in situazioni dalla quale poi vuoi fuggire, facendoti nascere sensi di colpa. Oppure potresti voler attrarre persone “irraggiungibili” per te provocandoti la sensazione di essere poco attraente. 
Trasformazione: imparare la responsabilità emotiva che ti permetterà di vivere con gioia e leggerezza  le tue relazioni. 
Puoi aiutarti con il codice vibrazionale “Responsability” e “Initiation”.  
",
                6 => "Albero: bisogno di stabilità.
 Nella prima parte della vita potresti avere bisogno di stabilità emotiva che ti può portare a cercarla o in una relazione stabile precoce o nella focalizzazione sul lavoro che ti autorizza ad evitare le relazioni. Hai paura del tradimento e quindi potresti attrarlo o metterlo in atto. Hai bisogno di ritrovare la fiducia nella vita per permetterti di vivere maggiormente nel flusso accettando gli eventuali cambiamenti o imparando a metterti veramente in gioco senza temere che poi finisca.
Trasformazione: trasformare il bisogno di controllo in fiducia e libertà per sé stessi e gli altri. 
Puoi usare il codice vibrazionale “Flow”, oppure “Indipendence Mama” o Indipendence Papa”. 
",
                7 => "Acqua: bisogno di empatia.
 Nella prima parte della vita potresti avere bisogno di sentirti compreso profondamente dall’altro. Potresti manifestarlo o richiamando la sua attenzione con il tuo dolore, oppure prendendoti cura dell’altro sperando che la controparte faccia lo stesso con te. 
Spesso questo tipo di situazioni attrae persone poco empatiche che non solo non capiscono il tuo dolore ma te ne procurano.  
Trasformazione: entrare in contatto con il proprio dolore, trasformarlo e permetterti di vivere relazioni eque.
Puoi usare il codice vibrazionale  “Empathy”.
",
                8 => "Specchio: bisogno di eccellenza.
 Nella prima parte della vita potresti avere la tendenza ad idealizzare la relazione e a cercarne una idilliaca dove l’altro corrisponde ad un ideale che ti sei fatto tu che nella stragrande maggiorananza dei casi non corrisponde alla realtà facendoti vivere profonde delusioni. 
Questo potrebbe farti pensare che tu non sei destinato a vivere l’amore facendoti diventare o cinico o accettare anche relazioni che non corrispondono a ciò che desideri.
Trasformazione: ricollegarti al tuo sogno e perseverare fino al raggiungimento del tuo sogno d’amore che però deve corrispondere ad una persona reale e umana.
Puoi usare il codice vibrazionale “Vision”. 
",
                9 => "Fulmine:  Colpo di fulmine. La tua prima parte della vita potresti aver vissuto/vivere l’esperienza di grandi colpi di fulmine. Innamorarti istantaneamente di persone che non conosci e che poi potrebbero deluderti quando la relazione comincia a diventare seria, oppure non raggiungere lo stato di relazione. In entrambi i casi potresti pensare di avere un destino avverso, oppure chiuderti alle relazioni in quanto non puoi governare gli innamoramenti e quindi è meglio che non accadano. Trasformazione: imparare a gestire gli impulsi in modo da poter vivere gli innamoramenti senza buttartici dentro in modo troppo impulsivo, imparando il discernimento e a respingere ciò che non va bene per te e ad accogliere ciò che va bene. Puoi usare il codice vibrazionale “Papa” o “Mama”.",
            ],
            "FAMIGLIA" => [
                1 => " Fuoco: Una famiglia in movimento. Una cosa della quale ti devi guardare bene è cadere nell'illusione che la staticità (confondendola con la stabilità) ti renderà felice. Tu hai bisogno di continue nuove avventure e quindi se decidi di creare una famiglia con qualcuno ricordati bene di questo aspetto. Deve essere una famiglia in continuo movimento o che è inserita in un contesto molto attivo. La famiglia tradizionale molto basata sulla routine non fa per te. Rifletti bene anche sul tema figli: se decidi di averne ricordati che tu hai bisogno di avere sempre nuovi stimoli, quindi è meglio che imposti le cose in modo da poterne avere coinvolgendo i tuoi figli. La cosa importante è che tu non metta al mondo figli perché ci si aspetta questo da te.",
                2 => "Gelo: Una famiglia accudente. Tu hai bisogno di impostare una famiglia che si prenda cura dei bisogni emotivi di tutti. Hai bisogno di una casa e che la famiglia risulti unita e vada d'accordo. Devi solo stare attento di non occuparti tu dei bisogni emotivi degli altri e che gli altri non facciano altrettanto. La casa è un luogo sacro per te: deve avere quel giusto grado di comfort e bellezza che ti rende piacevole la lunga permanenza. I figli dovrebbero essere per te una forma di espressione naturale; se così non fosse c'è un blocco energetico.",
                3 => " Anelli: una famiglia allargata. L'amicizia è un grande valore per te, hai bisogno che sia espresso sia in casa che fuori. È probabile che la tua sia una casa dove ci si trova a parlare. Potresti quindi voler vivere in piccole comunità, oppure aprire la tua casa agli amici. Potresti vivere più situazioni sentimentali che poi si intrecciano diventando famiglie allargate. Devi stare attento solo a capire se tutti i componenti della famiglia amano questa continua invasione degli spazi domestici e cercare di venire incontro anche a chi ha bisogno di intimità senza soffocare il tuo bisogno di apertura. I figli non sono necessariamente una tua forma di espressione, potresti averli ma avere comunque la tendenza ad inserirli nel contesto di amici.",
                4 => "Seme: una famiglia confortevole.  Hai bisogno che la tua famiglia si fondi su un ambiente confortevole, sia dal punto di vista affettivo oltre che economico, ma anche dell'ambiente e delle relazioni esterne alla famiglia. Tendi a creare corporazione, nel senso che tu pensi che insieme è meglio. Potresti avere quindi la tendenza ad ascoltare troppo le opinioni della famiglia di provenienza o delle persone con le quali ti sei associato. Ti piace trascorrere buon tempo con le persone che ami, apprezzi le piccole cose, i gesti di attenzione e la cura. I figli potrebbero essere una tua forma di espressione, attenzione a non metterli al centro del tuo mondo e a far ricadere su di loro troppe aspettative.",
                5 => "Fiore: famiglia giocosa. Hai bisogno di un ambiente familiare allegro, dove ci sia spazio per la creatività, per il gioco, per il divertimento. Ti pesa moltissimo l'impegno quotidiano come la gestione della casa e dei bisogni altrui, per cui dovrai stare attento a non inserirti in contesti che ti richiedano troppo questo tipo di impegno. Potresti sentirti più attratto da semiconvivenze o situazioni comunque libere. Se anche hai scelto di formare una famiglia ricordati di alleggerire al massimo il quotidiano con soluzioni creative. I figli possono essere una tua forma espressiva, in quanto ti permettono di esprimere la tua parte di giocosità; in questo caso dovrai radicare bene per affrontare la parte dell'impegno.",
                6 => "Albero: una famiglia stabile. Ti piace l'idea di avere o dare stabilità alla tua famiglia. Hai la tendenza quindi a gestire o a dirigere in quanto hai la visione di come andrebbero fatte le cose. Devi stare attento ad ascoltare anche le opinioni altrui altrimenti rischi di vivere molti contrasti. In alcuni casi potresti essere una persona che fatica a trovare la sua stabilità e quindi a fuggire dalle situazioni che richiedono un tuo impegno (in questo caso ci sono blocchi energetici). In generale hai bisogno di rapporti stabili e duraturi. I figli possono essere una tua forma di espressione, fai attenzione all'ascolto dei loro bisogni emotivi.",
                7 => "Acqua: una famiglia che trasmette valori. Hai bisogno che la famiglia che costituisci trasmetta i valori in cui credi. Che siano spirituali, culturali, politici o saperi pratici per te è importante che avvenga la trasmissione. È quindi fondamentale per te comprendere se le persone che scegli di avere al tuo fianco sono in linea con essi perché con lo scorrere del tempo potrebbe diventare un problema. Anche nel caso in cui dovessi scegliere persone di altre culture fai attenzione a capire se i principi che per te sono fondamentali vengono condivisi. I figli possono essere una tua naturale forma di espressione, attenzione ad accettare eventuali espressioni di altri valori.",
                8 => " Specchio: una famiglia equa. Per te è importante che ci sia equità nel dare e nell'avere. È fondamentale la ripartizione dello sforzo e dell'impegno. Hai quindi la tendenza a mettere regole chiare e precise nella gestione dello svolgimento dell'impegno quotidiano, devi solo stare attento che le regole non siano troppo rigide e che non valutino i bisogni degli altri. Hai altresì bisogno dei tuoi spazi di libertà, per cui nell'equità del fare devi tenere presente anche la possibilità di allontanarti per momenti di riossigenazione. I figli possono essere una tua forma di espressione, fai solo attenzione a non sostituire le regole con l'ascolto.",
                9 => "Fulmine: una famiglia che si aiuta. Hai bisogno di sapere che puoi contare sulla tua famiglia e del resto tu per essa ci sei. Avrai quindi la tendenza a cercare di unirti a persone delle quali ti puoi fidare, che hanno dato prova di esserci non solo nei momenti piacevoli, ma anche nei momenti meno divertenti. Potresti quindi vivere grandi delusioni se ti accorgi che non è così. È importante saper scegliere bene ma ricordarsi anche che questa è una tua attitudine che non è detto venga naturale anche ad altri. I figli possono essere una tua forma di espressione, potranno sicuramente contare su di te.",
            ],
            "EGO" => [
                1 => " Fuoco: Passionale  La tua idea di coppia ideale è passionale. Cerchi una persona con la quale condividere le tue passioni e della quale appassionarti. Soffri molto se la persona con cui stai ostacola le tue passioni, potresti sentirlo come un modo per smorzarti, ti toglie l'entusiasmo e potresti cercare di trovare passione in rapporti paralleli. Potresti anche avere la tendenza a vivere rapporti di breve durata, in modo che siano sempre passionali.",
                2 => "Gelo: Dolce La tua idea di coppia è dolce e accudente. Cerchi una persona con la quale vivere bene l'intimità del nido. Della quale prenderti cura e che si prenda cura di te. Soffri molto se la persona è assente o non ti mostra interesse e cura, potresti sentirlo come un abbandono e quindi iniziare a stare male emotivamente o fisicamente per ottenere le sue attenzioni. Oppure potresti decidere di vivere in solitudine con la compagnia di animali.",
                3 => "Anelli: Social La tua idea di coppia è social. Nel senso che ti piace l'idea di vivere la coppia all'interno di gruppi sociali o di amici, o familiari o associativi o social. In pratica ti piace la coppia che si apre al mondo e che non si chiude nel suo piccolo mondo. Soffri profondamente la chiusura e il possesso che ti toglie la vivacità di cui hai bisogno. Potresti anche scegliere di vivere coppie aperte o relazioni multiple.",
                4 => "Seme: Famiglia La tua idea di coppia è quella legata alla famiglia che genera figli o che si prende cura di animali, terra o che lavora assieme. Per te il concetto di famiglia come mutuo soccorso e base fondante della vita è fondamentale. Fatichi in situazioni dove l'altro non si assume il suo ruolo e tu potresti avere la tendenza ad annullarti pur di portarlo verso quel concetto di famiglia che desideri tu. Potresti decidere di vivere in comunità cercando la famiglia.",
                5 => "Fiore: Creativa La tua idea di coppia è creativa. Hai bisogno che la persona che sta al tuo fianco progetti con te nuove esperienze da creare assieme e veder fiorire. Per te la coppia è una tavolozza dove dipingere la tua esistenza assieme all'altra persona. Fatichi a vivere in situazioni troppo noiose, dove l'altro non ti stimola o non viene solleticato dai tuoi stimoli. Potresti vivere molte relazioni eccezionali ma poco durature.",
                6 => " Albero: Rispettosa La tua idea di coppia è rispettosa. È importante per te sentirti profondamente rispettato. Hai bisogno che l'altro ti dimostri di capire come funzioni e di adoperarsi per fare in modo di venirti incontro in quello che per te è fondamentale. Di fronte alle mancanze di rispetto potresti arrivare a chiudere la relazione per inadeguatezza alle tue aspettative. Potresti cadere nella tentazione di accettare di stare con una persona che ti rispetta ma che ti annoia.",
                7 => " Acqua: Fusionale La tua idea di coppia è fusionale. È importante per te sentire la fusione con l'altro. Hai bisogno di sentirti profondamente capito e amato e offri comprensione e vicinanza in ogni situazione. Soffri profondamente se ti senti trattato in modo superficiale o indifferente. Potresti cadere nel pericoloso ruolo di crocerossino, fai attenzione! Non è aiutando l'altro che farai in modo che si accorga di quanto sei importante.",
                8 => "Specchio: Intelligente La tua idea di coppia è pragmatica e intelligente. È importante per te organizzare la coppia in modo tale che risponda al meglio ai tuoi bisogni e al tuo stile di vita. Non ami che la coppia ti sposti da qualcosa che per te in questo momento è importante e ha priorità. Chi ti sta vicino deve essere indipendente e non avere costante bisogno di te. Attenzione a non evitare di affrontare le emozioni profonde in questo modo, perché prima o poi i nodi vengono al pettine.",
                9 => "Fulmine: che ti sconvolga la vita Se proprio proprio ti devi impegnare in una relazione, deve essere qualcosa che ti sconvolge la vita. Non ti basta una relazione qualunque, ma qualcosa che ti obblighi a rimettere tutto in discussione. Cosa che potresti non volere con la coscienza, ma cercare inconsciamente. Hai bisogno di cambiare punto di vista sull'amore e solo l'amore stesso lo può fare. Quando arriva potresti, però, cercare di boicottarlo per paura. Attenzione a non perderlo.",
            ],
            "BISOGNO" => [
                1 => "FUOCO +: hai bisogno di conquistare, di vedere il risultato, possibilmente in breve tempo, hai bisogno sempre di stimoli nuovi, di passione, di continue novità. / FUOCO -: hai bisogno di venire conquistato, di essere amato, adorato, hai bisogno di essere al centro del mondo delle persone che ami, di sentire sempre rinnovata la passione nei tuoi confronti.",

                2 => "GELO +: hai bisogno di poterti prendere cura delle persone che ami e venire riconosciuto per questo, non ami però doverti occupare dei problemi troppo stressanti. Tu ti occupi delle emozioni. / GELO -: hai bisogno di comodità, di tranquillità, di poterti permettere di vivere i tuoi sogni, possibilmente d'amore. Hai bisogno di sentirti in un nido sicuro.",

                3 => "ANELLI +: hai bisogno di verità, di sapere come vanno le cose, di avere chiarezza sulle situazioni. Non ti piacciono i sotterfugi e preferisci sapere e scegliere con consapevolezza. / ANELLI -: hai bisogno di comunicare, di sentirti ascoltato ma soprattutto di poterti esprimere. Hai bisogno anche di avere amicizie e di non essere concentrato solo in una situazione.",

                4 => "SEME +: hai bisogno di sentirti parte, di essere riconosciuto per il tuo ruolo, di sapere che fai parte di quella famiglia, quel gruppo, hai quel ruolo per quella persona. / SEME -: hai bisogno di nutrimento, prima di tutto affettivo. Di sentirti sazio, di sapere che da parte hai sicurezze anche economiche. Ma sentirti amato anche affettivamente è la prima cosa.",

                5 => "FIORE +: hai bisogno di divertimento e di leggerezza. Hai bisogno che le situazioni che vivi non siano mai troppo sovraccariche di responsabilità. Hai bisogno di civettare, di corteggiare. / FIORE -: hai bisogno di libertà, di non sentirti chiuso in situazioni ingabbianti. Hai bisogno di poter cambiare continuamente situazione, di sentirti nella possibilità di movimento.",

                6 => "ALBERO +: hai bisogno di stabilità quindi cerchi di prevedere qualunque situazione possa scombussolare questa tua tranquillità. Hai bisogno di avere sotto controllo la situazione. / ALBERO -: hai bisogno di non sentirti sovraccaricato di responsabilità. Hai bisogno di appoggiarti ad altri per poter sostenere il tuo ruolo. Hai bisogno di sentirti libero.",

                7 => "ACQUA +: hai bisogno che il tuo dolore venga compreso e accolto, senti il bisogno che qualcuno si interessi a te e alla tua sofferenza. Hai bisogno di ascolto. / ACQUA -: hai bisogno di sentire che sei di aiuto nel sostenere gli altri nel dolore, oppure per guarire gli altri dal proprio dolore. Hai bisogno di sentirti utile.",

                8 => "SPECCHIO +: hai bisogno di sentirti importante per le persone a cui tieni, oppure nel posto di lavoro. Hai bisogno che venga apprezzato ciò che fai e ciò che sei e che ti venga riconosciuto. / SPECCHIO -: hai bisogno di sapere che hai fatto tutto per evitare i problemi, avrai quindi bisogno di recuperare più informazioni possibili rispetto a ciò che ti crea ansia, in modo da evitare di avere amare sorprese.",

                9 => "FULMINE +: hai bisogno di sentirti accettato dalla persona che ami, dalla famiglia o dal tuo gruppo di appartenenza. Vorresti da tutti e tre, ma in caso uno non ti accetti, ti riversi sugli altri dando il massimo. / FULMINE -: hai bisogno di sentirti investito della missione di fare accettare qualcosa di non accettabile, un gruppo di persone, un'ideologia. Sei portatore di pace e mediazione. Hai bisogno di sentirti in una missione importante.",
            ],

            "PUNTO_DEBOLE" => [
                1 => "FUOCO +: quando le cose non procedono velocemente. Se una situazione ti appassiona la vuoi ottenere subito. Ti irrita profondamente dover aspettare e per questo potresti avere l'istinto di insistere o di agire in modo impulsivo chiudendo o allontanandoti con rabbia. Puoi aiutare questo aspetto con il codice vibrazionale Stay. / FUOCO -: quando non ti senti desiderato. Se non ti senti desiderato potresti avere la tendenza ad andare in sconforto prima ancora di averci provato, rinunciando a monte. Ma spesso accade che chi ha questo aspetto emani segnali di chiusura che non invogliano l'altro a muoversi. Puoi aiutare questo aspetto con il codice vibrazionale Flow.",

                2 => "GELO +: potresti avere timore di andare in profondità nei tuoi sentimenti e avere quindi la tendenza a cercare di starne in superficie, occupandoti più di cose belle che di affrontare questo aspetto, venendo, a volte, accusato di non essere adulto. Puoi aiutare questo aspetto con il codice vibrazionale Initiation. / GELO -: potresti avere il timore di essere abbandonato e quindi o evitare di entrare in situazioni che ti fanno vivere questo pericolo, rinunciando a monte a delle opportunità, oppure attaccandoti alla persona o alla situazione offrendoti senza ritegno, vergognandotene. Puoi aiutare questo aspetto con il codice vibrazionale Indipendence Mama.",

                3 => "ANELLI +: potresti avere bisogno compulsivo di fare esperienze eccitanti, meglio se particolari e che hanno il sapore del destinico. Esperienze che spesso diventano grandi delusioni per cui potresti arrivare a non permetterti più di farne per paura di soffrire ancora. Puoi aiutare questo aspetto con il codice vibrazionale Papa. / ANELLI -: potresti soffrire di diffidenza nei confronti degli altri, dovuta alla paura di essere tradito, ingannato. Potresti quindi mettere in atto tutta una serie di prove che l'altro deve superare per rassicurarti, salvo rischiare di autoingannarti. Puoi aiutare questo aspetto con il codice vibrazionale Indipendence Papa.",

                4 => "SEME +: potresti vergognarti di mostrarti per quello che sei e quindi avere la tendenza a rimanere in ombra soffrendo perché non vieni notato o perché non ti si dà peso. Spesso tutto parte proprio dalla tua incapacità di affermarti. Puoi aiutare questo aspetto con il codice vibrazionale [manca il nome del codice]. / SEME -: potresti avere la sensazione di non essere all'altezza degli altri e quindi cercare di esibire tutto ciò che hai da mostrare per attirare l'attenzione. Il rischio è di ridicolizzarti o di suscitare antipatia. Puoi aiutare questo aspetto con il codice vibrazionale Mama.",

                5 => "FIORE +: potresti avere la tendenza all'incostanza e di questo vergognarti. Potresti soffrire per gli sguardi di disapprovazione che ti vengono lanciati dalla persona che ami o per il continuo mostrarti la tua inadeguatezza. Puoi aiutare questo aspetto con il codice vibrazionale Responsability. / FIORE -: potresti avere la tendenza a non difenderti e per questo vergognarti del tuo senso di impotenza. Potresti provare il desiderio di silenziosa vendetta, magari attuarla per poi sentirti in colpa. Puoi aiutare questo aspetto con il codice vibrazionale Humility.",

                6 => "ALBERO +: potresti avere la tendenza a non assumerti la responsabilità emotiva di alcune situazioni, in particolar modo la tendenza al tradimento e di questo vergognarti, nonostante tu potresti essere molto responsabile in altri settori della vita. Puoi aiutare questo aspetto con il codice vibrazionale Papa. / ALBERO -: potresti avere il terrore del tradimento e per questo cercare di controllare la situazione. Potresti quindi risultare soffocante e attirare proprio quella situazione che tanto temi. Puoi aiutare questo aspetto con il codice vibrazionale Initiation.",

                7 => "ACQUA +: potresti avere la tendenza a cercare sostegno e aiuto eccessivo quando soffri, questo potrebbe allontanare le persone e farti provare la forte sensazione di solitudine. In amore potresti avere la tendenza a manipolare con il bisogno. Puoi aiutare questo aspetto con il codice vibrazionale Responsability. / ACQUA -: Potresti vergognarti di mostrare il tuo dolore, questo da un lato ti aiuta a sentirti forte, ma potresti rischiare di far credere alla persona che ami che tu non hai bisogno di nulla e quindi attirare un atteggiamento di indifferenza ai tuoi bisogni. Puoi aiutare questo aspetto con il codice vibrazionale Humility.",

                8 => "SPECCHIO +: hai la tendenza ad avere paura delle delusioni, di essere tradito, di vivere fallimenti. Hai paura di illuderti. Questo potrebbe farti rinunciare a molte possibilità e farti sentire irrealizzato. Potresti quindi avvicinarti e allontanarti dalla persona di tuo interesse per evitare di andare troppo in profondità rischiando di rovinare il rapporto. Puoi aiutare questo aspetto con il codice vibrazionale Emphaty. / SPECCHIO -: hai la tendenza ad essere estremamente riservato, a mantenere le distanze, magari con estrema educazione perché hai paura di soffrire, di essere manipolato. Questo fa sì che potresti vedere la tua vita bloccata nelle relazioni in quanto non fai capire i tuoi veri desideri. Potresti quindi dissimulare disinteresse allo scopo di avvicinarti proteggendoti che però potrebbe non arrivare mai ad una realizzazione. Puoi aiutare questa situazione con il codice vibrazionale Acept.",

                9 => "FULMINE +: tieni, tieni, tieni e poi… scoppi. Hai paura che accada, ma se la situazione diventa troppo pesante non reggi più il peso e le conseguenze possono essere anche irreparabili, perché se scoppi, rompi e potresti perdere la persona che ami. Puoi aiutare questa situazione con il codice vibrazionale Vision. / FULMINE -: temi di non riuscire a superare determinati ostacoli, eviti di entrare in certe situazioni per paura dell'abbandono, di dover vivere lo strazio del doverti allontanare emotivamente da determinate situazioni. Potresti quindi diventare oppositivo alla persona che ti interessa o che ami attirando il suo allontanamento. Puoi aiutare questa situazione con il codice vibrazionale Calm X.",
            ],

            "MISSIONE" => [
                1 => "AMORE PURO: È l'amore depurato dalle aspettative, dal bisogno di riconoscimento, dalla rabbia. È un amore che si dona generosamente e coraggiosamente. Probabilmente dovrai vivere più relazioni e probabilmente le vivrai con grandi picchi di passione e delusione e questo ti richiederà di trasformare l'eccesso di impulso per arrivare a esprimere questo tuo amore in modo entusiasta ma quieto.",

                2 => "AMORE ADULTO: È l'amore che deve crescere e smettere di aspettarsi dall'altra ciò che ci si aspetta da un genitore. È l'amore che sa stare al proprio posto con il giusto grado di calma di chi sa cos'è giusto e cos'è sbagliato ma può permettersi di lasciar sbagliare gli altri per lasciarli crescere. Probabilmente dovrai vivere dipendenze affettive prima di trovare la strada dell'autonomia affettiva che ti insegnerà a sorreggerti sulle tue gambe e a cercare persone che sanno fare lo stesso per vivere un rapporto sano e adulto.",

                3 => "REINCONTRARE L'AMORE: È l'amore che è stato troppe volte deluso, che ha smesso di crederci, che aspetta da fuori l'arrivo dell'amore quando il cuore si è inaridito. È l'amore che deve tornare a credere che l'amore esiste e che può essere vissuto. Probabilmente dovrai incontrare persone che potrebbero 'sembrare' quelle giuste per poi rivelarsi una delusione. Potrai anche incontrare persone che sembrano 'destinate' ma con le quali vivrai situazioni molto dolorose. Dovrai affrontare un percorso spirituale per riconnetterti all'essenza dell'amore per attrarre a te l'amore che desideri.",

                4 => "SENTIRE LA PIENEZZA DELL'AMORE: È l'amore che non si sente mai sazio, quello che ne vorrebbe sempre di più, che non si sente mai appagato. È l'amore che deve ritrovare il suo senso di abbondanza, sentire il nutrimento e potersi esprimere dal pieno e non dal senso di vuoto. Probabilmente vivrai relazioni poco appaganti, oppure che ti faranno sempre sentire inadeguato finché non arriverai a capire che il proprio valore non dipende dall'altra. Allora si potrà vivere una relazione più appagante in quanto si percepisce ciò che l’altra riesce a dare.",

                5 => "VIVERE LA LEGGEREZZA DELL'AMORE: È l'amore che deve scrollarsi di dosso il senso di pesantezza dell'impegno quotidiano. È l'amore che deve saper superare la gabbia della routine e ritrovare il gioco attraente che lo rende così speciale. Probabilmente o avrai la tendenza a fuggire dalle relazioni serie o tenderai a caricarti dei problemi di tutti facendoti schiacciare dal peso del quotidiano, fino a che non avrai incontrato la leggerezza del servizio d'amore e avrai imparato ad impegnarti solo per ciò che ti compete. Allora tornerai a giocare all'amore.",

                6 => "L'AMORE LIBERO: È l'amore che deve imparare a lasciar fluire e a non voler controllare gli eventi e l'altra per paura di perderla. È l'amore che deve tornare a ricordarsi che sta in piedi anche da solo, che può ospitare un'altra per il tempo che ha senso che rimanga per poi lasciarla andare e permettersi di vivere altre esperienze. Che anche quando si costruisce assieme si rimane liberi di manifestare sé stessi senza imporre all'altra la propria visione. Potresti vivere relazioni altalenanti, oppure con un grosso carico di gelosia finché non trovi la stabilità in te, allora anche la relazione diventerà stabile.",

                7 => "VIVERE LA TRASFORMAZIONE DELL'AMORE: È l'amore che teme la perdita, che soffre tremendamente l'abbandono. È l'amore che deve ritornare a ricordarsi che la vita è fugace e che il vero amore è altro. Che deve ricordarsi che in questa dimensione tutto ha un termine e che non va pianto ma onorato. È l'amore che si trasforma in saggezza dell'amore. Potresti vivere molte storie dolorose o lutti importanti fino a che non avrai imparato a lasciare andare e a onorare la memoria mantenendo lo sguardo nel qui e ora per poter godere dell'amore che c'è nella tua vita.",

                8 => "RICONOSCERE L'AMORE: È l'amore che illude e si autoillude. È l'amore che vive d'inganni e che si crogiola nei sensi di colpa. È l'amore che deve diventare limpido e vero che impara ad amare imparando a riconoscere l'autoinganno e a trasformarlo in chiarezza. Potresti vivere molte relazioni basate sull'inganno o sull'autoinganno dove ti sentirai in colpa per ciò che fai oppure vittima delle ingiustizie altrui finché non imparerai a riconoscere i tuoi meccanismi e a non metterli più in atto. Solo allora potrai vivere una relazione basata sull'amore vero.",

                9 => "SALVARTI DALL'AMORE: È l'amore crocerossino, quello che cerca di salvare l'altra, che dà troppo. Oppure che fugge dall'amore per non sentirsi in obbligo a salvare l'altra o a dare troppo. È l'amore che deve liberarsi dal senso di responsabilità della salvezza altrui e imparare a salvare sé stesso attraverso la crescita personale. Potresti vivere relazioni dipendenti con persone che chiedono troppo e non danno molto o dove tu chiedi troppo e non dai molto. Dovrai imparare a lasciare che gli altri imparino a badare a sé stessi e di conseguenza a offrirti ciò che meriti. Solo allora vivrai un amore equo.",
            ],

            "CUORE" => [
                1 => "Farti sentire unico. Chi vuole conquistarti deve farti sentire unico e speciale, farti sentire scelto e desiderato, allora tu offrirai tutta la tua passione e ricambierai con entusiasmo.",

                2 => "Coccolarti. Chi vuole conquistarti deve farti sentire accudito, che si accorge dei tuoi piccoli desideri e li soddisfa per farti piacere, allora tu ti offrirai pienamente con tutta la tenerezza della quale disponi.",

                3 => "Farti sentire ascoltato. Chi vuole conquistarti deve farti sentire ascoltato, chiederti come stai e cercare di capire quello che cerchi di comunicare. Possibilmente avere argomenti comuni, allora tu ti esprimerai con entusiasmo rendendo sempre allegro il rapporto.",

                4 => "Farti sentire amato. Chi vuole conquistarti deve farti sentire amato anche in modo affettivo e corporeo. Deve cercarti e farti sentire desiderato, allora ti offrirai pienamente e cercherai di soddisfare i suoi desideri con piacere.",

                5 => "Farti divertire. Chi vuole conquistarti deve farti divertire e giocare con te, anche con la seduzione. Deve cercare di mantenere alto il livello di erotismo, allora ti offrirai con concentrazione e sarai il miglior premio da ricevere.",

                6 => "Farti sentire al sicuro. Chi vuole conquistarti deve farti sentire al sicuro, evitare di muoversi con altalenanza e dubbio e mostrarti la prospettiva di ciò che state facendo, allora ti concederai pienamente e offrirai sostegno e grande passione.",

                7 => "Farti sentire la passione profonda. Chi vuole conquistarti deve farti provare una passione profonda. Non ti innamori di chiunque, solo alcune persone possono veramente accedere a te e non è qualcosa che si può decidere: accade. Solo allora puoi seriamente considerare di amare.",

                8 => "Farti perdere la testa. Chi vuole conquistarti deve farti perdere letteralmente la testa. Se mantieni il controllo potresti rimanere nei tuoi sistemi difensivi, se invece ti innamori in modo folle, allora puoi lasciarti andare.",

                9 => "Farti sentire eccezionale. Chi vuole conquistarti deve farti sentire eccezionale, qualcosa di sconvolgente che entra nella tua vita e che destabilizza le certezze. Deve quindi dimostrare il coraggio di amarti; a quel punto tu supererai qualunque ostacolo per stare con chi ami.",
            ],
            "MATERNA" => [
                1 => "FUOCO: Cerchi una donna passionale, che ti faccia sentire vivo. Questo tuo bisogno di vivacità e passione potrebbe però farti innescare involontariamente situazioni di conflitto che celano la rabbia nei confronti del femminile. (Ti consigliamo il codice vibrazionale Mama)",

                2 => "GELO: Cerchi una donna calma e accudente, che ti faccia sentire rilassato. Questo tuo bisogno di calma potrebbe però farti cercare di evitare conflitti al punto di non esprimere i tuoi bisogni e non permettere all'altra di esprimerli. (Ti consigliamo il codice vibrazionale Expression)",

                3 => "ANELLI: Cerchi una donna interessante e che ti faccia sentire capito. Questo tuo bisogno di stimoli potrebbe però farti essere spesso distratto o eccessivamente ansioso, generando discussioni nella coppia. (Ti consigliamo il codice vibrazionale Calm Y)",

                4 => "SEME: Cerchi una donna bella e curata, può essere anche particolare (non la bellezza standard) ma hai bisogno di guardarla e di pensare che sia bella. Attenzione a non idealizzarla e a non comprendere lati meno semplici da gestire. (Ti consigliamo il codice vibrazionale Empathy)",

                5 => "FIORE: Cerchi una donna spiritosa e allegra, che sappia divertirsi e che voglia farlo con te. Attenzione perché potresti incorrere in questi due problemi: o che l'inizio è bello poi il rapporto si appesantisce, o che non porti avanti relazioni per paura che si appesantiscano. Dietro c'è la tua difficoltà a radicare. (Ti consigliamo il codice vibrazionale Stay)",

                6 => "ALBERO: Cerchi una donna che sappia stare al suo posto, che conosca il proprio ruolo nel mondo e lo sappia incarnare. Attenzione che potrebbe però o tentare di governare la tua vita o tu avere la pretesa di governare la sua. (Ti consigliamo il codice vibrazionale Indipendence Mama)",

                7 => "ACQUA: Cerchi una donna che si prenda cura di te, che sappia farti sentire amato e rispettato. Attenzione che potresti andare in frustrazione se questo non accade come vuoi tu e potresti diventare pungente e innescare litigi. Oppure potresti diventare tu crocerossino se lei non si prende cura di te. (Ti consigliamo il codice vibrazionale Accept)",

                8 => "SPECCHIO: Cerchi una donna che sia intelligente, che ti faccia sentire orgoglioso di averla vicino, con la quale condividere idee. Attenzione a non tenere troppo il rapporto sul piano mentale e a non dimenticarti delle emozioni. (Ti consigliamo il codice vibrazionale Empathy)",

                9 => "FULMINE: Cerchi una donna imprevedibile, che non ti faccia mai sentire annoiato, che riesca sempre a stupirti con le sue idee. Attenzione che non diventi un rapporto instabile, oppure che non si creino quelle situazioni che vi obbligano a rimettere a posto problemi che avete generato voi. (Ti consigliamo il codice vibrazionale Initiation)",
            ],
            "PUNTODIFORZA" => [
                1 => "FUOCO: con la passione. Se ci sono problemi in coppia cerchi di ritrovare l'entusiasmo per qualcosa che vi accomuna o cerchi di riaccendere la passione. 
Nello specifico il tuo punto di forza si esprime: 
FUOCO +: con la sessualità 
FUOCO -: con progetti comuni che vi appassionano.",

                2 => "GELO: la calma. Se ci sono problemi in amore cerchi di riportare la calma e la pacatezza per poter riparare ciò che è stato lacerato. 
Nello specifico il tuo punto di forza si esprime: 
GELO +: ti allontani, anche solo con il silenzio. 
GELO -: hai bisogno di dormire, di riposare.",

                3 => "ANELLI: la connessione. Se ci sono problemi in amore cerchi di ripristinare il dialogo e la connessione con lei. Per te il dialogo è fondamentale. 
Nello specifico il tuo punto di forza si esprime: 
ANELLI +: con il chiarimento 
ANELLI -: facendo cose insieme che vi riportano al dialogo.",

                4 => "SEME: la tua capacità di amare. Se ci sono problemi in amore cerchi di ritrovare la dolcezza, anche e soprattutto attraverso il contatto fisico. Per te l'abbraccio, anche intimo, è fondamentale. 
Nello specifico il tuo punto di forza si esprime: 
SEME +: abbraccio 
SEME -: fare cose piacevoli insieme.",

                5 => "FIORE: la tua capacità di alleggerire la vita. Se ci sono problemi in amore cerchi di risolverli riportando il gioco nella coppia. Hai bisogno di alleggerire le situazioni. 
Nello specifico il tuo punto di forza si esprime: 
FIORE +: gioco a due 
FIORE -: fare cose divertenti insieme.",

                6 => "ALBERO: la tua capacità di essere stabile. Se ci sono problemi nella coppia cerchi di risolverli riportando la stabilità. Hai bisogno di equilibrio e che le emozioni non sbilancino troppo la vita. 
Nello specifico il tuo punto di forza si esprime: 
ALBERO +: stare solo per non agire in modo impulsivo. 
ALBERO -: allontanarti dal mondo con lei.",

                7 => "ACQUA: la tua capacità di trasformare. Se ci sono problemi nella coppia tu hai bisogno di andare a fondo per trasformarli. Hai bisogno di profondità. 
Nello specifico il tuo punto di forza si esprime: 
ACQUA +: sostieni la situazione e lei se serve. 
ACQUA -: sensibilità.",

                8 => "SPECCHIO: la tua capacità di decidere. Se ci sono problemi nella coppia tendi a raccogliere informazioni per arrivare a prendere le decisioni che meglio aiutano la risoluzione. 
Nello specifico il tuo punto di forza si esprime: 
SPECCHIO +: capacità di analizzare 
SPECCHIO -: visione a lungo termine.",

                9 => "FULMINE: la tua capacità di resistere. Se ci sono problemi nella coppia tendi a sopportare per lungo tempo per permettere a lei di crescere e cambiare atteggiamento. Tu credi nella pazienza. 
Nello specifico il tuo punto di forza si esprime: 
FULMINE +: pazienza 
FULMINE -: educare al cambiamento.",
            ],
            "PATERNA" => [
                1 => "FUOCO: Conquistare. Conquistare è un talento che deriva dal tuo albero genealogico paterno. La conquista è tipica dei viaggiatori e dei condottieri. Ti rende quindi una persona che tende ad avere continuo desiderio di conquista, ti piace corteggiare e far cadere ai tuoi piedi chi ha attratto la tua attenzione. Dall'albero genealogico paterno potresti aver acquisito una certa aggressività che potresti manifestare o soffocare. Dovresti imparare a trasformarla. (Ti consigliamo il codice vibrazionale PAPA) Come padre avrai la tendenza ad essere un genitore dinamico, che ama viaggiare e fare gite fuori porta.",

                2 => "GELO: Prendersi cura. Prendersi cura è un talento che deriva dall'albero genealogico del padre. È tipico di chi ha la tendenza a mettersi a servizio degli altri. Ti rende quindi una persona che tende ad essere attenta ai bisogni di chi ti sta vicino e molto disponibile alle richieste altrui. Dall'albero genealogico paterno potresti aver ereditato la tendenza ad un atteggiamento che diventa servile o all'immaturità. Dovresti imparare a trasformarla. (Ti consigliamo il codice vibrazionale INDIPENDENCE PAPA) Come padre avrai la tendenza ad essere molto accudente e ad ascoltare i tuoi figli.",

                3 => "ANELLI: Comunicare. Comunicare è un talento che deriva dall'albero genealogico paterno. La tua capacità di mediare nelle situazioni, ma anche di essere l'anima allegra della casa o della compagnia. Ti rende quindi una persona capace di tenere sempre vivo l'interesse di chi è al tuo fianco. Dall'albero genealogico potresti aver ereditato la tendenza ad essere molto dispersivo nell'attenzione che dai e a dare retta anche a persone poco affidabili. Dovresti imparare a trasformarla. (Ti consigliamo il codice vibrazionale STAY). Come padre potresti avere la tendenza a inserire bene i tuoi figli nella tua rete relazionale e ad aiutarli a districarsi nelle relazioni.",

                4 => "SEME: Importanza della famiglia. Dall'albero genealogico di tuo padre deriva la sensazione che senza una famiglia sulla quale appoggiarti tu faccia fatica a garantirti la sopravvivenza. Darai quindi importanza alla tua famiglia, oppure all'impresa per cui lavori o operi. Ovviamente questo ti rende molto affidabile. Devi stare molto attento a capire fino a che punto questo corrisponda ad un tuo vero bisogno o ad un'imposizione inconscia. Dovresti chiederti fino a che punto corrisponda alla tua verità interiore. (Ti consigliamo il codice vibrazionale INDIPENDENCE PAPA). Come padre potresti avere la tendenza a voler provvedere a tutti i bisogni dei tuoi figli, a non voler far mancare loro nulla.",

                5 => "FIORE: Idee liberali. Dall'albero genealogico di tuo padre potresti aver ereditato una certa mentalità liberale, poco tradizionale, che vede nella relazione un'esperienza importante e da vivere con grande entusiasmo piuttosto che un'istituzione sociale. Potresti però aver acquisito anche una certa tendenza a muoverti nella relazione in modo un po' adolescenziale, senza arrivare mai ad assumertene veramente la responsabilità. Ti farebbe bene andare verso una nuova maturità emotiva. (Ti consigliamo il codice INITIATION). Come padre potresti essere molto giocoso e divertente.",

                6 => "ALBERO: Capo famiglia. Dall'albero genealogico di tuo padre potresti aver ereditato il ruolo di capo famiglia. La capacità di gestire, di guidare. Questo tenderà a farti sentire molto responsabile rispetto a chi ritieni di dover proteggere. Potresti aver ereditato, però, anche una certa propensione all'autoritarismo. In questo caso ti consigliamo di iniziare a valutare di trasformare questa dinamica in autorevolezza. (Ti consigliamo il codice vibrazionale PAPA). Come padre avrai la tendenza a dare il buon esempio ai tuoi figli e a cercare di insegnare loro le regole per stare al mondo.",

                7 => "ACQUA: Onorare la memoria. La storia per te ha un valore importante, soprattutto quella che coinvolge la tua famiglia. Potresti quindi o portare avanti la memoria di storie familiari e avere il desiderio di farle proseguire con la tua vita o con la tua stirpe coinvolgendo le persone che ami. Potresti avere il desiderio di trovare una persona che come te crede nelle tradizioni. Potresti, però, faticare ad accettare la necessità altrui di cambiare direzione. Dovresti imparare ad accettare i cambiamenti. (Ti consigliamo il codice vibrazionale ACCEPT). Come padre avrai la tendenza ad insegnare ciò che per tradizione ritieni giusto.",

                8 => "SPECCHIO: Condividere sapere. La ricerca, la conoscenza hanno per te un valore importante. Lo hai ereditato dal tuo albero genealogico familiare. Hai quindi il desiderio di incontrare persone che come te amino conoscere, scoprire, pensare, discutere. Hai però ereditato anche una certa intolleranza per chi cade nell'errore rischiando di diventare insensibile al dolore altrui, anche a quello di chi ti è più vicino. Dovresti imparare ad essere più compassionevole ed empatico. (Ti consigliamo il codice EMPATHY). Come padre potresti essere molto stimolante, sempre pronto a dare spunto e direzione.",

                9 => "FULMINE: Voglia di essere d'aiuto. Dal tuo albero genealogico paterno hai ereditato la voglia di essere d'aiuto. Potresti quindi cercare persone che hanno bisogno d'aiuto o persone che come te hanno il desiderio di offrire il proprio aiuto e di farlo assieme. Devi stare attento a non attirare persone parassite e a non diventare crocerossino. (Ti consigliamo il codice vibrazionale MAMA). Come padre potresti essere molto attento ai bisogni dei tuoi figli e cercare di aiutarli nelle difficoltà.",
            ],
            "SOCIETA" => [
                1 => "CONQUISTA: Hai l'istinto predatore. Osservi la preda e la punti quando hai capito quali mosse fare. Lo fai in modo continuativo ma brioso, in modo da incuriosirla. Sai giocare con la preda e non molli finché non giungi alla conquista.",

                2 => "CURA DEI DETTAGLI: Avvicini in modo gentile, ti presenti in modo molto curato. I tuoi modi sono pacati e ami attrarre attraverso i piccoli particolari. Ti piace stupirla con piccoli dettagli che creano un'armonia d'insieme che la affascina.",

                3 => "INTERESSE: Ami attrarre attraverso la condivisione degli interessi. Spesso sei pure inconsapevole di attrarre. Potresti farlo limitandoti a vivere con passione e gioia quello che ti piace, esponendolo in modo gioioso e attraendola senza avere la chiara intenzione di farlo.",

                4 => "MOSTRARE IL PROPRIO VALORE: Cerchi di attrarre mostrando il valore che hai. Ti prendi cura di te, cerchi di presentarti bene. Cerchi di conoscere cose e condividerle destando interesse per ciò che fai o sai. Fai in modo che lei ti apprezzi e che desideri essere conquistata.",

                5 => "SIMPATIA: Il tuo modo di attrarre è attraverso la simpatia, il gioco, il divertimento. Cerchi di coinvolgerla in modo allegro e se ti piace potresti divertirti a punzecchiarla e a cercare di attrarre la sua attenzione con lo scherzo.",

                6 => "AFFIDABILITÀ: Il tuo modo di attrarre è facendola sentire al sicuro. Cerchi di farle capire che con te può lasciarsi andare, può permettersi di essere sé stessa senza maschere. Ami l'intimità sia fisica che emotiva e se puoi cerchi di trovare l'occasione per stare soli.",

                7 => "SENSUALITÀ: Il tuo modo di attrarre è attraverso il mistero, la parte più sensuale della vita. Ti piace giocare al chiaro-scuro, non rivelare mai troppo per non togliere l'aura di mistero che ti avvolge. Ti piace tenere la suspense e giocare con la sua psicologia.",

                8 => "PARLANDO: Tu conquisti parlando. Ti piace conoscerla, farle mille domande. Ti interessi a lei e cerchi di carpire più informazioni che puoi. Seduci facendole sentire il tuo interesse e ascolto. Non è detto che tu esprima molto di te, preferisci scoprirti in un secondo momento.",

                9 => "STUPENDO: Ti piace conquistare stupendola, facendole trovare ciò che le piace, oppure facendole fare esperienze mai fatte. Ami vedere lo stupore che si dipinge nel suo volto. Ti piace soprattutto sapere di avere intuito l'idea giusta.",
            ],

            "RICONOSCIMENTO" => [
                1 => "FUOCO +: vuoi che lei ti dimostri di credere in te, che si fidi delle decisioni che prendi, della direzione che dai e ti segua stando al tuo fianco, anche se doveste andare contro tutti gli altri. / FUOCO -: tu vuoi che lei si dimostri innamorata di te in modo passionale. Che ti faccia sentire il suo desiderio di te, che ti cerchi.",

                2 => "GELO +: vuoi che riconosca quanto amore e dedizione offri a lei. Che si accorga delle tante piccole attenzioni che sai avere e ti piacerebbe riceverle. / GELO -: vuoi essere semplicemente amato per quello che sei, senza tanti motivi, solo perché lei si è innamorata di te.",

                3 => "ANELLI +: vuoi che lei apprezzi la tua capacità di stare nel mondo e abbia la voglia di condividerlo con te. / ANELLI -: vuoi che lei apprezzi e condivida la tua visione particolare delle cose.",

                4 => "SEME +: hai bisogno di sapere che lei ti trovi bello, piacevole e che ammiri il modo in cui ti mostri nel mondo. / SEME -: hai bisogno che lei riconosca i tuoi talenti, quello che sai o che sai fare.",

                5 => "FIORE +: hai bisogno che lei ti trovi attraente e che ti dimostri che riconosce anche il fatto che lo sei anche per le altre. / FIORE -: vuoi che ti venga riconosciuto il fatto che tu sei capace di riconoscere i talenti che lei ha da mettere in campo e vuoi essere da stimolo perché si migliori.",

                6 => "ALBERO +: vuoi che ti venga riconosciuta la tua capacità di esserci sempre, di essere punto di riferimento e desideri che ti venga offerta la stessa cosa. / ALBERO -: vuoi che ti venga riconosciuto il valore che tu apporti nei progetti comuni, nel fatto che tu contribuisci sostanzialmente e desideri ricevere la gratificazione del tuo impegno.",

                7 => "ACQUA +: vuoi che ti venga riconosciuta la tua capacità di sentirla nel profondo e che lei si metta a disposizione di una comunicazione profonda. / ACQUA -: vuoi che ti venga riconosciuta la tua capacità di ascolto. Sai essere amico oltre che compagno e chiedi lo stesso a lei.",

                8 => "SPECCHIO +: vuoi che ti venga riconosciuta la tua capacità di essere equo nel dare e avere e desideri ricevere altrettanta equità. / SPECCHIO -: vuoi che ti venga riconosciuta la tua intelligenza e la tua capacità di analisi e comprensione.",

                9 => "FULMINE +: vuoi che ti venga riconosciuta la tua capacità di trasformare le situazioni negative in positive e la capacità di cambiare nel tempo. / FULMINE -: vuoi che ti venga riconosciuta la tua capacità di mantenere vive le tradizioni, di avere imparato ciò che ti è stato trasmesso.",
            ],
            "MAESTRO" => [
                1 => "FUOCO: Hai bisogno di sentirti unico e che la relazione ti accenda sempre. Se competi in amore vuoi vincere, ti piace catturare la preda. Ti piace che la persona ti faccia capire che prova passione per te. Tendi a spegnerti subito se ti si ignora e se la situazione non ti stimola.",

                2 => "GELO: Hai bisogno di sentirti unito alla persona che ami. Hai bisogno di sentire che siete una cosa sola, che se ci siete voi due tutto il resto non conta. Tendi però a stare appeso alle situazioni che non evolvono e a perdere tempo e occasioni.",

                3 => "ANELLI: Hai bisogno di sentirti ascoltato dalla persona che ami, ma anche e soprattutto di condividere passioni e di poter vivere insieme splendide avventure. Tendi però a distrarti dalla coppia o a causa di altre situazioni o a causa di interessi tuoi.",

                4 => "SEME: Hai bisogno di sentirti amato e di sentirlo anche fisicamente. Hai bisogno di sentirti avvolto dalla presenza dell'altra, meglio se in un contesto intimo e familiare. Potresti avere però troppo la proiezione della famiglia e meno del vivere l'amore.",

                5 => "FIORE: Hai bisogno di sentire che sei attraente. Ti piace vedere che le persone perdono la testa per te e quindi tendi a provocare per vedere le reazioni. Potresti però avere la difficoltà a controllare gli effetti di ciò che fai, perdere il contatto con i sentimenti dell'altra e quindi ferire involontariamente.",

                6 => "ALBERO: Hai bisogno di sentirti stabile nella relazione. Riesci a concederti veramente solo quando ti senti al sicuro, allora dai tantissimo e si può veramente fare affidamento su di te. Potresti avere però la tendenza alla gelosia, proprio per il tuo bisogno di non veder messe in discussione le tue sicurezze.",

                7 => "ACQUA: Hai bisogno di sentirti capito, ma soprattutto hai bisogno di sentire la profondità della relazione, che è una relazione speciale, unica. Una connessione animica profonda che va oltre lo spazio-tempo. In alcuni casi, però, potresti essere attratto dalla sessualità in modo ossessivo o dipendente e questo renderti succube della persona che hai davanti.",

                8 => "SPECCHIO: Hai bisogno di sentirti libero, hai quindi bisogno che la relazione che vivi ti conceda spazi di libertà, dove poterti ricaricare, tornare in te e donarti la voglia di essere nuovamente passionale con la persona che ami. Potresti però avere la pretesa di fare quello che vuoi senza ascoltare i bisogni dell'altra e questo portarti ad avere problemi di relazione.",

                9 => "FULMINE: Hai bisogno di sentire che la tua relazione è qualcosa di grandioso, oppure alla quale aspirare per gli altri, un esempio da seguire. Una relazione che si fonda su principi comuni, su ideali condivisi. Devi solo stare attento di non caricare di troppe aspettative la persona che hai di fronte, che altrimenti potrà solo deluderti.",
            ],
        ];
      
          $mappature_amore_donna = [
    "KARMA" => [
        1 => "Fuoco: bisogno compulsivo del sesso/rifiuto del sesso. \nIl sesso è una delle forme d’espressione con la quale trasformiamo la rabbia. Dovrebbe essere un mezzo con la quale entriamo in comunicazione profonda con l’altro, ma in questo caso la difficoltà è proprio questa. Sia chi cerca compulsivamente il sesso, che chi lo rifiuta ha la difficoltà ad entrare in comunicazione profonda con l’altro in quanto in profondità c’è la rabbia.\nTrasformazione: contattare la rabbia e iniziare a “sentire” veramente l’altro. \nPer aiutarti puoi usare il codice vibrazionale “Papa” o “Mama”. ",
        2 => "Gelo: bisogno estremo di attenzioni. \nKarmicamente c’è una parte di te che non è diventata emotivamente adulta e questo ti porta a entrare in relazione esprimendo bisogni che potrebbero risultare infantili, o se anche non li esprimi, farti valutare non soddisfacente una relazione per motivi infantili. Il risultato è che potresti vivere o relazioni dipendenti o evitare le relazioni per paura di non ricevere ciò che ritieni giusto.\nTrasformazione: diventare emotivamente adulto e permetterti di vivere una relazione soddisfacente.\nPer aiutarti puoi usare il codice vibrazionale “Indipendence Papa” o “Indipendence Mama”.",
        3 => "Anelli: attrai relazioni karmiche.\nNella prima parte della vita potresti avere la tendenza ad attrarre relazioni karmiche. Hai dei sospesi animici con anime che hai dovuto/dovrai incontrare per apprendere una lezione importante. Gli incontri non sono evitabili, possono portarti a relazioni alleate o tossiche, ma lo svolgimento della relazione dipende dal tuo libero arbitrio. La cosa importante è che tu sappia che non sono relazioni che DEVONO restare nella tua vita. \nTrasformazione: accettare l’aspetto destinico di questo punto e sentirsi liberi nel proseguire la vita in libera scelta. \nPer aiutarti puoi usare il codice vibrazionale “Vision” o “Acept”.",
        4 => "Seme: \nBisogno di sicurezza. Nella prima parte della vita potresti avere la tendenza a chiedere dimostrazioni d’amore continue non sentendoti mai appagat* pienamente. Questo nasce da un aspetto di profonda insicurezza rispetto la tua autostima. Avrai quindi la tendenza a far scappare le persone o, nel momento in cui riesci a conquistarne una, ad essere terrorizzat* di perderla accettando anche situazioni poco valorizzanti per te o diventando soffocante per l’altro. \nTrasformazione: contattare il senso del tuo valore e attrarre situazioni appaganti. Puoi aiutarti con il codice vibrazionale “Value” e “Initiation”.",
        5 => "Fiore: bisogno di attrarre.\nNella prima parte della vita potresti avere continuamente bisogno di sentire che riesci ad attrarre altre persone. Potresti avere quindi la tendenza a flirtare anche quando il contesto non lo richiederebbe. Potresti attrarre anche chi non ti interessa veramente trovandoti incastrato in situazioni dalla quale poi vuoi fuggire, facendoti nascere sensi di colpa. Oppure potresti voler attrarre persone “irraggiungibili” per te provocandoti la sensazione di essere poco attraente. \nTrasformazione: imparare la responsabilità emotiva che ti permetterà di vivere con gioia e leggerezza  le tue relazioni. \nPuoi aiutarti con il codice vibrazionale “Responsability” e “Initiation”.  ",
        6 => "Albero: bisogno di stabilità.\nNella prima parte della vita potresti avere bisogno di stabilità emotiva che ti può portare a cercarla o in una relazione stabile precoce o nella focalizzazione sul lavoro che ti autorizza ad evitare le relazioni. Hai paura del tradimento e quindi potresti attrarlo o metterlo in atto. Hai bisogno di ritrovare la fiducia nella vita per permetterti di vivere maggiormente nel flusso accettando gli eventuali cambiamenti o imparando a metterti veramente in gioco senza temere che poi finisca.\nTrasformazione: trasformare il bisogno di controllo in fiducia e libertà per sé stessi e gli altri. \nPuoi usare il codice vibrazionale “Flow”, oppure “Indipendence Mama” o Indipendence Papa”. ",
        7 => "Acqua: bisogno di empatia.\nNella prima parte della vita potresti avere bisogno di sentirti compreso profondamente dall’altro. Potresti manifestarlo o richiamando la sua attenzione con il tuo dolore, oppure prendendoti cura dell’altro sperando che la controparte faccia lo stesso con te. \nSpesso questo tipo di situazioni attrae persone poco empatiche che non solo non capiscono il tuo dolore ma te ne procurano.  \nTrasformazione: entrare in contatto con il proprio dolore, trasformarlo e permetterti di vivere relazioni eque.\nPuoi usare il codice vibrazionale  “Empathy”.",
        8 => "Specchio: bisogno di eccellenza.\nNella prima parte della vita potresti avere la tendenza ad idealizzare la relazione e a cercarne una idilliaca dove l’altro corrisponde ad un ideale che ti sei fatto tu che nella stragrande maggiorananza dei casi non corrisponde alla realtà facendoti vivere profonde delusioni. \nQuesto potrebbe farti pensare che tu non sei destinato a vivere l’amore facendoti diventare o cinico o accettare anche relazioni che non corrispondono a ciò che desideri.\nTrasformazione: ricollegarti al tuo sogno e perseverare fino al raggiungimento del tuo sogno d’amore che però deve corrispondere ad una persona reale e umana.\nPuoi usare il codice vibrazionale “Vision”. ",
        9 => "Fulmine: \nColpo di fulmine. La tua prima parte della vita potresti aver vissuto/vivere l’esperienza di grandi colpi di fulmine. Innamorarti istantaneamente di persone che non conosci e che poi potrebbero deluderti quando la relazione comincia a diventare seria, oppure non raggiungere lo stato di relazione. In entrambi i casi potresti pensare di avere un destino avverso, oppure chiuderti alle relazioni in quanto non puoi governare gli innamoramenti e quindi è meglio che non accadano. \nTrasformazione: imparare a gestire gli impulsi in modo da poter vivere gli innamoramenti senza buttartici dentro in modo troppo impulsivo, imparando il discernimento e a respingere ciò che non va bene per te e ad accogliere ciò che va bene. \nPuoi usare il codice vibrazionale “Papa” o “Mama”."
    ],
            "FAMIGLIA" => [
                1 => " Fuoco: Passionale  La tua idea di coppia ideale è passionale. Cerchi una persona con la quale condividere le tue passioni e della quale appassionarti. Soffri molto se la persona con cui stai ostacola le tue passioni, potresti sentirlo come un modo per smorzarti, ti toglie l'entusiasmo e potresti cercare di trovare passione in rapporti paralleli. Potresti anche avere la tendenza a vivere rapporti di breve durata, in modo che siano sempre passionali.",
                2 => "Anelli: una famiglia allargata.
L'amicizia è un grande valore per te, hai bisogno che sia espresso sia in casa che fuori. È probabile che la tua sia una casa dove ci si trova a parlare. Potresti quindi voler vivere in piccole comunità, oppure aprire la tua casa agli amici. Potresti vivere più situazioni sentimentali che poi si intrecciano diventando famiglie allargate. Devi stare attento solo a capire se tutti i componenti della famiglia amano questa continua invasione degli spazi domestici e cercare di venire incontro anche a chi ha bisogno di intimità senza soffocare il tuo bisogno di apertura. I figli non sono necessariamente una tua forma di espressione, potresti averli ma avere comunque la tendenza ad inserirli nel contesto di amici.
",
                3 => "Anelli: Social La tua idea di coppia è social. Nel senso che ti piace l'idea di vivere la coppia all'interno di gruppi sociali o di amici, o familiari o associativi o social. In pratica ti piace la coppia che si apre al mondo e che non si chiude nel suo piccolo mondo. Soffri profondamente la chiusura e il possesso che ti toglie la vivacità di cui hai bisogno. Potresti anche scegliere di vivere coppie aperte o relazioni multiple.",
                4 => "Seme: una famiglia confortevole. 
Hai bisogno che la tua famiglia si fondi su un ambiente confortevole, sia dal punto di vista affettivo oltre che economico, ma anche dell'ambiente e delle relazioni esterne alla famiglia. Tendi a creare corporazione, nel senso che tu pensi che insieme è meglio. Potresti avere quindi la tendenza ad ascoltare troppo le opinioni della famiglia di provenienza o delle persone con le quali ti sei associato. Ti piace trascorrere buon tempo con le persone che ami, apprezzi le piccole cose, i gesti di attenzione e la cura. I figli potrebbero essere una tua forma di espressione, attenzione a non metterli al centro del tuo mondo e a far ricadere su di loro troppe aspettative.
.",
                5 => "Fiore: famiglia giocosa.
Hai bisogno di un ambiente familiare allegro, dove ci sia spazio per la creatività, per il gioco, per il divertimento. Ti pesa moltissimo l'impegno quotidiano come la gestione della casa e dei bisogni altrui, per cui dovrai stare attento a non inserirti in contesti che ti richiedano troppo questo tipo di impegno. Potresti sentirti più attratto da semiconvivenze o situazioni comunque libere. Se anche hai scelto di formare una famiglia ricordati di alleggerire al massimo il quotidiano con soluzioni creative. I figli possono essere una tua forma espressiva, in quanto ti permettono di esprimere la tua parte di giocosità; in questo caso dovrai radicare bene per affrontare la parte dell'impegno.
",
                6 => " Albero: una famiglia stabile.
Ti piace l'idea di avere o dare stabilità alla tua famiglia. Hai la tendenza quindi a gestire o a dirigere in quanto hai la visione di come andrebbero fatte le cose. Devi stare attento ad ascoltare anche le opinioni altrui altrimenti rischi di vivere molti contrasti. In alcuni casi potresti essere una persona che fatica a trovare la sua stabilità e quindi a fuggire dalle situazioni che richiedono un tuo impegno (in questo caso ci sono blocchi energetici). In generale hai bisogno di rapporti stabili e duraturi. I figli possono essere una tua forma di espressione, fai attenzione all'ascolto dei loro bisogni emotivi.
.",
                7 => "Acqua: una famiglia che trasmette valori.
Hai bisogno che la famiglia che costituisci trasmetta i valori in cui credi. Che siano spirituali, culturali, politici o saperi pratici per te è importante che avvenga la trasmissione. È quindi fondamentale per te comprendere se le persone che scegli di avere al tuo fianco sono in linea con essi perché con lo scorrere del tempo potrebbe diventare un problema. Anche nel caso in cui dovessi scegliere persone di altre culture fai attenzione a capire se i principi che per te sono fondamentali vengono condivisi. I figli possono essere una tua naturale forma di espressione, attenzione ad accettare eventuali espressioni di altri valori.
",
                8 => "Specchio: una famiglia equa.
Per te è importante che ci sia equità nel dare e nell'avere. È fondamentale la ripartizione dello sforzo e dell'impegno. Hai quindi la tendenza a mettere regole chiare e precise nella gestione dello svolgimento dell'impegno quotidiano, devi solo stare attento che le regole non siano troppo rigide e che non valutino i bisogni degli altri. Hai altresì bisogno dei tuoi spazi di libertà, per cui nell'equità del fare devi tenere presente anche la possibilità di allontanarti per momenti di riossigenazione. I figli possono essere una tua forma di espressione, fai solo attenzione a non sostituire le regole con l'ascolto.",
                9 => "Fulmine:Hai bisogno di sapere che puoi contare sulla tua famiglia e del resto tu per essa ci sei. Avrai quindi la tendenza a cercare di unirti a persone delle quali ti puoi fidare, che hanno dato prova di esserci non solo nei momenti piacevoli, ma anche nei momenti meno divertenti. Potresti quindi vivere grandi delusioni se ti accorgi che non è così. È importante saper scegliere bene ma ricordarsi anche che questa è una tua attitudine che non è detto venga naturale anche ad altri. I figli possono essere una tua forma di espressione, potranno sicuramente contare su di te.",
            ],
          "EGO" => [
        1 => "Fuoco: Passionale\nLa tua idea di coppia ideale è passionale. Cerchi una persona con la quale condividere le tue passioni e della quale appassionarti. Soffri molto se la persona con cui stai ostacola le tue passioni, potresti sentirlo come un modo per smorzarti, ti toglie l'entusiasmo e potresti cercare di trovare passione in rapporti paralleli. Potresti anche avere la tendenza a vivere rapporti di breve durata, in modo che siano sempre passionali.",
        2 => "Gelo: Dolce\nLa tua idea di coppia è dolce e accudente. Cerchi una persona con la quale vivere bene l'intimità del nido. Della quale prenderti cura e che si prenda cura di te. Soffri molto se la persona è assente o non ti mostra interesse e cura, potresti sentirlo come un abbandono e quindi iniziare a stare male emotivamente o fisicamente per ottenere le sue attenzioni. Oppure potresti decidere di vivere in solitudine con la compagnia di animali.",
        3 => "Anelli: Social\nLa tua idea di coppia è social. Nel senso che ti piace l'idea di vivere la coppia all'interno di gruppi sociali o di amici, o familiari o associativi o social. In pratica ti piace la coppia che si apre al mondo e che non si chiude nel suo piccolo mondo. Soffri profondamente la chiusura e il possesso che ti toglie la vivacità di cui hai bisogno. Potresti anche scegliere di vivere coppie aperte o relazioni multiple.",
        4 => "Seme: Famiglia\nLa tua idea di coppia è quella legata alla famiglia che genera figli o che si prende cura di animali, terra o che lavora assieme. Per te il concetto di famiglia come mutuo soccorso e base fondante della vita è fondamentale. Fatichi in situazioni dove l'altro non si assume il suo ruolo e tu potresti avere la tendenza ad annullarti pur di portarlo verso quel concetto di famiglia che desideri tu. Potresti decidere di vivere in comunità cercando la famiglia.",
        5 => "Fiore: Creativa\nLa tua idea di coppia è creativa. Hai bisogno che la persona che sta al tuo fianco progetti con te nuove esperienze da creare assieme e veder fiorire. Per te la coppia è una tavolozza dove dipingere la tua esistenza assieme all'altra persona. Fatichi a vivere in situazioni troppo noiose, dove l'altro non ti stimola o non viene solleticato dai tuoi stimoli. Potresti vivere molte relazioni eccezionali ma poco durature.",
        6 => "Albero: Rispettosa\nLa tua idea di coppia è rispettosa. È importante per te sentirti profondamente rispettato. Hai bisogno che l'altro ti dimostri di capire come funzioni e di adoperarsi per fare in modo di venirti incontro in quello che per te è fondamentale. Di fronte alle mancanze di rispetto potresti arrivare a chiudere la relazione per inadeguatezza alle tue aspettative. Potresti cadere nella tentazione di accettare di stare con una persona che ti rispetta ma che ti annoia.",
        7 => "Acqua: Fusionale\nLa tua idea di coppia è fusionale. È importante per te sentire la fusione con l'altro. Hai bisogno di sentirti profondamente capito e amato e offri comprensione e vicinanza in ogni situazione. Soffri profondamente se ti senti trattato in modo superficiale o indifferente. Potresti cadere nel pericoloso ruolo di crocerossino, fai attenzione! Non è aiutando l'altro che farai in modo che si accorga di quanto sei importante.",
        8 => "Specchio: Intelligente\nLa tua idea di coppia è pragmatica e intelligente. È importante per te organizzare la coppia in modo tale che risponda al meglio ai tuoi bisogni e al tuo stile di vita. Non ami che la coppia ti sposti da qualcosa che per te in questo momento è importante e ha priorità. Chi ti sta vicino deve essere indipendente e non avere costante bisogno di te. Attenzione a non evitare di affrontare le emozioni profonde in questo modo, perché prima o poi i nodi vengono al pettine.",
        9 => "Fulmine: che ti sconvolga la vita\nSe proprio proprio ti devi impegnare in una relazione, deve essere qualcosa che ti sconvolge la vita. Non ti basta una relazione qualunque, ma qualcosa che ti obblighi a rimettere tutto in discussione. Cosa che potresti non volere con la coscienza, ma cercare inconsciamente. Hai bisogno di cambiare punto di vista sull'amore e solo l'amore stesso lo può fare. Quando arriva potresti, però, cercare di boicottarlo per paura. Attenzione a non perderlo."
    ],
          "BISOGNO" => [
        1 => "Fuoco: di agire con passione/ -1 che ti si faccia appassionare\nFUOCO +: hai bisogno di conquistare, di vedere il risultato, possibilmente in breve tempo, hai bisogno sempre di stimoli nuovi, di passione, di continue novità.\nFUOCO -: hai bisogno di venire conquistato, di essere amato, adorato, hai bisogno di essere al centro del mondo delle persone che ami, di sentire sempre rinnovata la passione nei tuoi confronti.",
        2 => "Gelo: di accudimento, dimenticare i problemi/ -2 comodità, poter sognare\nGELO +: hai bisogno di poterti prendere cura delle persone che ami e venire riconosciuto per questo, non ami però doverti occupare dei problemi troppo stressanti. Tu ti occupi delle emozioni.\nGELO -: hai bisogno di comodità, di tranquillità, di poterti permettere di vivere i tuoi sogni, possibilmente d'amore. Hai bisogno di sentirti in un nido sicuro.",
        3 => "Anelli: sapere, essere al corrente/-3 comunicare, parlare\nANELLI +: hai bisogno di verità, di sapere come vanno le cose, di avere chiarezza sulle situazioni. Non ti piacciono i sotterfugi e preferisci sapere e scegliere con consapevolezza.\nANELLI -: hai bisogno di comunicare, di sentirti ascoltato ma soprattutto di poterti esprimere. Hai bisogno anche di avere amicizie e di non essere concentrato solo in una situazione.",
        4 => "Seme: status, sentirti nel giusto ruolo/ -4 nutrimento anche affettivo\nSEME +: hai bisogno di sentirti parte, di essere riconosciuto per il tuo ruolo, di sapere che fai parte di quella famiglia, quel gruppo, hai quel ruolo per quella persona.\nSEME -: hai bisogno di nutrimento, prima di tutto affettivo. Di sentirti sazio, di sapere che da parte hai sicurezze anche economiche. Ma sentirti amato anche affettivamente è la prima cosa.",
        5 => "Fiore: divertimento/ -5 libertà\nFIORE +: hai bisogno di divertimento e di leggerezza. Hai bisogno che le situazioni che vivi non siano mai troppo sovraccariche di responsabilità. Hai bisogno di civettare, di corteggiare.\nFIORE -: hai bisogno di libertà, di non sentirti chiuso in situazioni ingabbianti. Hai bisogno di poter cambiare continuamente situazione, di sentirti nella possibilità di movimento.",
        6 => "Albero: avere il controllo/ -6 non sentirsi sovraccaricati\nALBERO +: hai bisogno di stabilità quindi cerchi di prevedere qualunque situazione possa scombussolare questa tua tranquillità. Hai bisogno di avere sotto controllo la situazione.\nALBERO -: hai bisogno di non sentirti sovraccaricato di responsabilità. Hai bisogno di appoggiarti ad altri per poter sostenere il tuo ruolo. Hai bisogno di sentirti libero.",
        7 => "Acqua: essere capiti nel proprio dolore/ -7 salvare gli altri dal dolore\nACQUA +: hai bisogno che il tuo dolore venga compreso e accolto, senti il bisogno che qualcuno si interessi a te e alla tua sofferenza. Hai bisogno di ascolto.\nACQUA -: Hai bisogno di sentire che sei di aiuto nel sostenere gli altri nel dolore, oppure per guarire gli altri dal proprio dolore. Hai bisogno di sentirti utile.",
        8 => "Specchio: essere importante/-8 prevedere i problemi\nSPECCHIO +: hai bisogno di sentirti importante per le persone a cui tieni, oppure nel posto di lavoro. Hai bisogno che venga apprezzato ciò che fai e ciò che sei e che ti venga riconosciuto.\nSPECCHIO -: hai bisogno di sapere che hai fatto tutto per evitare i problemi, avrai quindi bisogno di recuperare più informazioni possibili rispetto a ciò che ti crea ansia, in modo da evitare di avere amare sorprese.",
        9 => "Fulmine: essere accettati/ -9 far accettare gli altri o situazioni\nFULMINE +: hai bisogno di sentirti accettato dalla persona che ami, dalla famiglia o dal tuo gruppo di appartenenza. Vorresti da tutti e tre, ma in caso uno non ti accetti, ti riversi sugli altri dando il massimo.\nFULMINE -: hai bisogno di sentirti investito della missione di fare accettare qualcosa di non accettabile, un gruppo di persone, un'ideologia. Sei portatore di pace e mediazione. Hai bisogno di sentirti in una missione importante."
    ],

            "PUNTO_DEBOLE" => [
                1 => "Fuoco: +1 quando le cose non procedono velocemente/-1 quando non ti senti desiderato.
FUOCO +: quando le cose non procedono velocemente. Se una situazione ti appassiona la vuoi ottenere subito. Ti irrita profondamente dover aspettare e per questo potresti avere l'istinto di insistere o di agire in modo impulsivo chiudendo o allontanandoti con rabbia. Puoi aiutare questo aspetto con il codice vibrazionale Stay.
FUOCO -: quando non ti senti desiderato. Se non ti senti desiderato potresti avere la tendenza ad andare in sconforto prima ancora di averci provato, rinunciando a monte. Ma spesso accade che chi ha questo aspetto emani segnali di chiusura che non invogliano l'altro a muoversi. Puoi aiutare questo aspetto con il codice vibrazionale Flow.
",

                2 => "Gelo: +2 Superficialità/-2 paura dell'abbandono
GELO +: potresti avere timore di andare in profondità nei tuoi sentimenti e avere quindi la tendenza a cercare di starne in superficie, occupandoti più di cose belle che di affrontare questo aspetto, venendo, a volte, accusato di non essere adulto. Puoi aiutare questo aspetto con il codice vibrazionale Initiation.
GELO -: potresti avere il timore di essere abbandonato e quindi o evitare di entrare in situazioni che ti fanno vivere questo pericolo, rinunciando a monte a delle opportunità, oppure attaccandoti alla persona o alla situazione offrendoti senza ritegno, vergognandotene. Puoi aiutare questo aspetto con il codice vibrazionale Indipendence Mama.
",

                3 => "Anelli: +3 ricerca dell'esperienza/-3 diffidenza
ANELLI +: potresti avere bisogno compulsivo di fare esperienze eccitanti, meglio se particolari e che hanno il sapore del destinico. Esperienze che spesso diventano grandi delusioni per cui potresti arrivare a non permetterti più di farne per paura di soffrire ancora. Puoi aiutare questo aspetto con il codice vibrazionale Papa.
ANELLI -: potresti soffrire di diffidenza nei confronti degli altri, dovuta alla paura di essere tradito, ingannato. Potresti quindi mettere in atto tutta una serie di prove che l'altro deve superare per rassicurarti, salvo rischiare di autoingannarti. Puoi aiutare questo aspetto con il codice vibrazionale Indipendence Papa.
",

                4 => "Seme: +4 Insicurezza (non si mostra)/- 4 insicurezza (vuole essere visto)
SEME +: potresti vergognarti di mostrarti per quello che sei e quindi avere la tendenza a rimanere in ombra soffrendo perché non vieni notato o perché non ti si dà peso. Spesso tutto parte proprio dalla tua incapacità di affermarti. Puoi aiutare questo aspetto con il codice vibrazionale [manca il nome del codice].
SEME -: potresti avere la sensazione di non essere all'altezza degli altri e quindi cercare di esibire tutto ciò che hai da mostrare per attirare l'attenzione. Il rischio è di ridicolizzarti o di suscitare antipatia. Puoi aiutare questo aspetto con il codice vibrazionale Mama.
",

                5 => "Fiore: +5 Incostanza/-5 non sa difendersi
FIORE +: potresti avere la tendenza all'incostanza e di questo vergognarti. Potresti soffrire per gli sguardi di disapprovazione che ti vengono lanciati dalla persona che ami o per il continuo mostrarti la tua inadeguatezza. Puoi aiutare questo aspetto con il codice vibrazionale Responsability.
FIORE -: potresti avere la tendenza a non difenderti e per questo vergognarti del tuo senso di impotenza. Potresti provare il desiderio di silenziosa vendetta, magari attuarla per poi sentirti in colpa. Puoi aiutare questo aspetto con il codice vibrazionale Humility.
",

                6 => "Albero: + 6 Tradimento, irresponsabilità/-6 paura del tradimento
ALBERO +: potresti avere la tendenza a non assumerti la responsabilità emotiva di alcune situazioni, in particolar modo la tendenza al tradimento e di questo vergognarti, nonostante tu potresti essere molto responsabile in altri settori della vita. 
Puoi aiutare questo aspetto con il codice vibrazionale Papa.
ALBERO -: potresti avere il terrore del tradimento e per questo cercare di controllare la situazione. Potresti quindi risultare soffocante e attirare proprio quella situazione che tanto temi. Puoi aiutare questo aspetto con il codice vibrazionale Initiation.
",

                7 => "Acqua: +7 Manipolazione (cerca di essere aiutato)/ -7 non vuole mostrare il dolore
ACQUA +: potresti avere la tendenza a cercare sostegno e aiuto eccessivo quando soffri, questo potrebbe allontanare le persone e farti provare la forte sensazione di solitudine. In amore potresti avere la tendenza a manipolare con il bisogno. Puoi aiutare questo aspetto con il codice vibrazionale Responsability.
ACQUA -: Potresti vergognarti di mostrare il tuo dolore, questo da un lato ti aiuta a sentirti forte, ma potresti rischiare di far credere alla persona che ami che tu non hai bisogno di nulla e quindi attirare un atteggiamento di indifferenza ai tuoi bisogni. Puoi aiutare questo aspetto con il codice vibrazionale Humility.
",

                8 => " Specchio:+8 Paura di soffrire (cinismo) /– 8 paura di soffrire (educazione-tiene le distanze)
SPECCHIO +: hai la tendenza ad avere paura delle delusioni, di essere tradito, di vivere fallimenti. Hai paura di illuderti. Questo potrebbe farti rinunciare a molte possibilità e farti sentire irrealizzato. Potresti quindi avvicinarti e allontanarti dalla persona di tuo interesse per evitare di andare troppo in profondità rischiando di rovinare il rapporto. Puoi aiutare questo aspetto con il codice vibrazionale Emphaty.
SPECCHIO -: hai la tendenza ad essere estremamente riservato, a mantenere le distanze, magari con estrema educazione perché hai paura di soffrire, di essere manipolato. Questo fa sì che potresti vedere la tua vita bloccata nelle relazioni in quanto non fai capire i tuoi veri desideri. Potresti quindi dissimulare disinteresse allo scopo di avvicinarti proteggendoti che però potrebbe non arrivare mai ad una realizzazione. Puoi aiutare questa situazione con il codice vibrazionale Acept.
",

                9 => "Fulmine:+9 paura di fare male (scoppiare)/-9 implosione (di non farcela)
FULMINE +: tieni, tieni, tieni e poi… scoppi. Hai paura che accada, ma se la situazione diventa troppo pesante non reggi più il peso e le conseguenze possono essere anche irreparabili, perché se scoppi, rompi e potresti perdere la persona che ami. Puoi aiutare questa situazione con il codice vibrazionale Vision.
FULMINE -: temi di non riuscire a superare determinati ostacoli, eviti di entrare in certe situazioni per paura dell'abbandono, di dover vivere lo strazio del doverti allontanare emotivamente da determinate situazioni. Potresti quindi diventare oppositivo alla persona che ti interessa o che ami attirando il suo allontanamento. Puoi aiutare questa situazione con il codice vibrazionale Calm X.
",
            ],

            "MISSIONE" => [
                1 => "Amore puro.
È l'amore depurato dalle aspettative, dal bisogno di riconoscimento, dalla rabbia. 
È un amore che si dona generosamente e coraggiosamente. 
Probabilmente dovrai vivere più relazioni e probabilmente le vivrai con grandi picchi di passione e delusione e questo ti richiederà di trasformare l'eccesso di impulso per arrivare a esprimere questo tuo amore in modo entusiasta ma quieto.
.",

                2 => "Amore adulto
È l'amore che deve crescere e smettere di aspettarsi dall'altra ciò che ci si aspetta da un genitore. 
È l'amore che sa stare al proprio posto con il giusto grado di calma di chi sa cos'è giusto e cos'è sbagliato ma può permettersi di lasciar sbagliare gli altri per lasciarli crescere. 
Probabilmente dovrai vivere dipendenze affettive prima di trovare la strada dell'autonomia affettiva che ti insegnerà a sorreggerti sulle tue gambe e a cercare persone che sanno fare lo stesso per vivere un rapporto sano e adulto.
",

                3 => "Reincontrare l'amore
È l'amore che è stato troppe volte deluso, che ha smesso di crederci, che aspetta da fuori l'arrivo dell'amore quando il cuore si è inaridito.
È l'amore che deve tornare a credere che l'amore esiste e che può essere vissuto.
Probabilmente dovrai incontrare persone che potrebbero sembrare quelle giuste per poi rivelarsi una delusione. Potrai anche incontrare persone che sembrano "destinate" ma con le quali vivrai situazioni molto dolorose. Dovrai affrontare un percorso spirituale per riconnetterti all'essenza dell'amore per attrarre a te l'amore che desideri.",

                4 => " Sentire la pienezza dell'amore.
È l'amore che non si sente mai sazio, quello che ne vorrebbe sempre di più, che non si sente mai appagato. 
È l'amore che deve ritrovare il suo senso di abbondanza, sentire il nutrimento e potersi esprimere dal pieno e non dal senso di vuoto.
Probabilmente vivrai relazioni poco appaganti, oppure che ti faranno sempre sentire inadeguato finché non arriverai a capire che il proprio valore non dipende dall'altra. Allora si potrà vivere una relazione più appagante in quanto si percepisce ciò che l'altra riesce a dare.
",

                5 => "Vivere la leggerezza dell'amore.
È l'amore che deve scrollarsi di dosso il senso di pesantezza dell'impegno quotidiano. È l'amore che deve saper superare la gabbia della routine e ritrovare il gioco attraente che lo rende così speciale.
Probabilmente o avrai la tendenza a fuggire dalle relazioni serie o tenderai a caricarti dei problemi di tutti facendoti schiacciare dal peso del quotidiano, fino a che non avrai incontrato la leggerezza del servizio d'amore e avrai imparato ad impegnarti solo per ciò che ti compete. Allora tornerai a giocare all'amore.
.",

                6 => ". L'amore libero.
È l'amore che deve imparare a lasciar fluire e a non voler controllare gli eventi e l'altra per paura di perderla. 
È l'amore che deve tornare a ricordarsi che sta in piedi anche da solo, che può ospitare un'altra per il tempo che ha senso che rimanga per poi lasciarla andare e permettersi di vivere altre esperienze. Che anche quando si costruisce assieme si rimane liberi di manifestare sé stessi senza imporre all'altra la propria visione. Potresti vivere relazioni altalenanti, oppure con un grosso carico di gelosia finché non trovi la stabilità in te, allora anche la relazione diventerà stabile.
",

                7 => "Vivere la trasformazione dell'amore.
È l'amore che teme la perdita, che soffre tremendamente l'abbandono. 
È l'amore che deve ritornare a ricordarsi che la vita è fugace e che il vero amore è altro. Che deve ricordarsi che in questa dimensione tutto ha un termine e che non va pianto ma onorato. 
È l'amore che si trasforma in saggezza dell'amore. 
Potresti vivere molte storie dolorose o lutti importanti fino a che non avrai imparato a lasciare andare e a onorare la memoria mantenendo lo sguardo nel qui e ora per poter godere dell'amore che c'è nella tua vita.
.",

                8 => "Riconoscere l'amore.
È l'amore che illude e si autoillude. È l'amore che vive d'inganni e che si crogiola nei sensi di colpa. 
È l'amore che deve diventare limpido e vero che impara ad amare imparando a riconoscere l'autoinganno e a trasformarlo in chiarezza. 
Potresti vivere molte relazioni basate sull'inganno o sull'autoinganno dove ti sentirai in colpa per ciò che fai oppure vittima delle ingiustizie altrui finché non imparerai a riconoscere i tuoi meccanismi e a non metterli più in atto. Solo allora potrai vivere una relazione basata sull'amore vero.

",

                9 => "Salvarti dall'amore
È l'amore crocerossino, quello che cerca di salvare l'altra, che dà troppo. Oppure che fugge dall'amore per non sentirsi in obbligo a salvare l'altra o a dare troppo.
È l'amore che deve liberarsi dal senso di responsabilità della salvezza altrui e imparare a salvare sé stesso attraverso la crescita personale. 
Potresti vivere relazioni dipendenti con persone che chiedono troppo e non danno molto o dove tu chiedi troppo e non dai molto. 
Dovrai imparare a lasciare che gli altri imparino a badare a sé stessi e di conseguenza a offrirti ciò che meriti. Solo allora vivrai un amore equo.
",
            ],

           "CUORE" => [
    1 => "Farti sentire unico
Chi vuole conquistarti deve farti sentire unico e speciale, farti sentire scelto e desiderato, allora tu offrirai tutta la tua passione e ricambierai con entusiasmo.",

    2 => "Coccolarti
Chi vuole conquistarti deve farti sentire accudito, che si accorge dei tuoi piccoli desideri e li soddisfa per farti piacere, allora tu ti offrirai pienamente con tutta la tenerezza della quale disponi.",

    3 => "Farti sentire ascoltato
Chi vuole conquistarti deve farti sentire ascoltato, chiederti come stai e cercare di capire quello che cerchi di comunicare. Possibilmente avere argomenti comuni, allora tu ti esprimerai con entusiasmo rendendo sempre allegro il rapporto.",

    4 => "Farti sentire amato
Chi vuole conquistarti deve farti sentire amato anche in modo affettivo e corporeo. Deve cercarti e farti sentire desiderato, allora ti offrirai pienamente e cercherai di soddisfare i suoi desideri con piacere.",

    5 => "Farti divertire
Chi vuole conquistarti deve farti divertire e giocare con te, anche con la seduzione. Deve cercare di mantenere alto il livello di erotismo, allora ti offrirai con concentrazione e sarai il miglior premio da ricevere.",

    6 => "Farti sentire al sicuro
Chi vuole conquistarti deve farti sentire al sicuro, evitare di muoversi con altalenanza e dubbio e mostrarti la prospettiva di ciò che state facendo, allora ti concederai pienamente e offrirai sostegno e grande passione.",

    7 => "Farti sentire la passione profonda
Chi vuole conquistarti deve farti provare una passione profonda. Non ti innamori di chiunque, solo alcune persone possono veramente accedere a te e non è qualcosa che si può decidere: accade. Solo allora puoi seriamente considerare di amare.",

    8 => "Farti perdere la testa
Chi vuole conquistarti deve farti perdere letteralmente la testa. Se mantieni il controllo potresti rimanere nei tuoi sistemi difensivi, se invece ti innamori in modo folle, allora puoi lasciarti andare.",

    9 => "Farti sentire eccezionale
Chi vuole conquistarti deve farti sentire eccezionale, qualcosa di sconvolgente che entra nella tua vita e che destabilizza le certezze. Deve quindi dimostrare il coraggio di amarti; a quel punto tu supererai qualunque ostacolo per stare con chi ami.",
],

           "MATERNA" => [
    1 => "Fuoco: Cerchi una donna passionale, che ti faccia sentire vivo. Questo tuo bisogno di vivacità e passione potrebbe però farti innescare involontariamente situazioni di conflitto che celano la rabbia nei confronti del femminile. (Ti consigliamo il codice vibrazionale Mama)",

    2 => "Gelo: Cerchi una donna calma e accudente, che ti faccia sentire rilassato. Questo tuo bisogno di calma potrebbe però farti cercare di evitare conflitti al punto di non esprimere i tuoi bisogni e non permettere all'altra di esprimerli. (Ti consigliamo il codice vibrazionale Expression)",

    3 => "Anelli: Cerchi una donna interessante e che ti faccia sentire capito. Questo tuo bisogno di stimoli potrebbe però farti essere spesso distratto o eccessivamente ansioso, generando discussioni nella coppia. (Ti consigliamo il codice vibrazionale Calm Y)",

    4 => "Seme: Cerchi una donna bella e curata, può essere anche particolare (non la bellezza standard) ma hai bisogno di guardarla e di pensare che sia bella. Attenzione a non idealizzarla e a non comprendere lati meno semplici da gestire. (Ti consigliamo il codice vibrazionale Empathy)",

    5 => "Fiore: Cerchi una donna spiritosa e allegra, che sappia divertirsi e che voglia farlo con te. Attenzione perché potresti incorrere in questi due problemi: o che l'inizio è bello poi il rapporto si appesantisce, o che non porti avanti relazioni per paura che si appesantiscano. Dietro c'è la tua difficoltà a radicare. (Ti consigliamo il codice vibrazionale Stay)",

    6 => "Albero: Cerchi una donna che sappia stare al suo posto, che conosca il proprio ruolo nel mondo e lo sappia incarnare. Attenzione che potrebbe però o tentare di governare la tua vita o tu avere la pretesa di governare la sua. (Ti consigliamo il codice vibrazionale Indipendence Mama)",

    7 => "Acqua: Cerchi una donna che si prenda cura di te, che sappia farti sentire amato e rispettato. Attenzione che potresti andare in frustrazione se questo non accade come vuoi tu e potresti diventare pungente e innescare litigi. Oppure potresti diventare tu crocerossino se lei non si prende cura di te. (Ti consigliamo il codice vibrazionale Accept)",

    8 => "Specchio: Cerchi una donna che sia intelligente, che ti faccia sentire orgoglioso di averla vicino, con la quale condividere idee. Attenzione a non tenere troppo il rapporto sul piano mentale e a non dimenticarti delle emozioni. (Ti consigliamo il codice vibrazionale Empathy)",

    9 => "Fulmine: Cerchi una donna imprevedibile, che non ti faccia mai sentire annoiato, che riesca sempre a stupirti con le sue idee. Attenzione che non diventi un rapporto instabile, oppure che non si creino quelle situazioni che vi obbligano a rimettere a posto problemi che avete generato voi. (Ti consigliamo il codice vibrazionale Initiation)",
],

            "PUNTODIFORZA" => [
                1 => "FUOCO: con la passione. Se ci sono problemi in coppia cerchi di ritrovare l'entusiasmo per qualcosa che vi accomuna o cerchi di riaccendere la passione. 
Nello specifico il tuo punto di forza si esprime: 
FUOCO +: con la sessualità 
FUOCO -: con progetti comuni che vi appassionano.",

                2 => "GELO: la calma. Se ci sono problemi in amore cerchi di riportare la calma e la pacatezza per poter riparare ciò che è stato lacerato. 
Nello specifico il tuo punto di forza si esprime: 
GELO +: ti allontani, anche solo con il silenzio. 
GELO -: hai bisogno di dormire, di riposare.",

                3 => "ANELLI: la connessione. Se ci sono problemi in amore cerchi di ripristinare il dialogo e la connessione con lei. Per te il dialogo è fondamentale. 
Nello specifico il tuo punto di forza si esprime: 
ANELLI +: con il chiarimento 
ANELLI -: facendo cose insieme che vi riportano al dialogo.",

                4 => "SEME: la tua capacità di amare. Se ci sono problemi in amore cerchi di ritrovare la dolcezza, anche e soprattutto attraverso il contatto fisico. Per te l'abbraccio, anche intimo, è fondamentale. 
Nello specifico il tuo punto di forza si esprime: 
SEME +: abbraccio 
SEME -: fare cose piacevoli insieme.",

                5 => "FIORE: la tua capacità di alleggerire la vita. Se ci sono problemi in amore cerchi di risolverli riportando il gioco nella coppia. Hai bisogno di alleggerire le situazioni. 
Nello specifico il tuo punto di forza si esprime: 
FIORE +: gioco a due 
FIORE -: fare cose divertenti insieme.",

                6 => "ALBERO: la tua capacità di essere stabile. Se ci sono problemi nella coppia cerchi di risolverli riportando la stabilità. Hai bisogno di equilibrio e che le emozioni non sbilancino troppo la vita. 
Nello specifico il tuo punto di forza si esprime: 
ALBERO +: stare solo per non agire in modo impulsivo. 
ALBERO -: allontanarti dal mondo con lei.",

                7 => "ACQUA: la tua capacità di trasformare. Se ci sono problemi nella coppia tu hai bisogno di andare a fondo per trasformarli. Hai bisogno di profondità. 
Nello specifico il tuo punto di forza si esprime: 
ACQUA +: sostieni la situazione e lei se serve. 
ACQUA -: sensibilità.",

                8 => "SPECCHIO: la tua capacità di decidere. Se ci sono problemi nella coppia tendi a raccogliere informazioni per arrivare a prendere le decisioni che meglio aiutano la risoluzione. 
Nello specifico il tuo punto di forza si esprime: 
SPECCHIO +: capacità di analizzare 
SPECCHIO -: visione a lungo termine.",

                9 => "FULMINE: la tua capacità di resistere. Se ci sono problemi nella coppia tendi a sopportare per lungo tempo per permettere a lei di crescere e cambiare atteggiamento. Tu credi nella pazienza. 
Nello specifico il tuo punto di forza si esprime: 
FULMINE +: pazienza 
FULMINE -: educare al cambiamento.",
            ],
            "PATERNA" => [
                1 => "FUOCO: Conquistare. Conquistare è un talento che deriva dal tuo albero genealogico paterno. La conquista è tipica dei viaggiatori e dei condottieri. Ti rende quindi una persona che tende ad avere continuo desiderio di conquista, ti piace corteggiare e far cadere ai tuoi piedi chi ha attratto la tua attenzione. Dall'albero genealogico paterno potresti aver acquisito una certa aggressività che potresti manifestare o soffocare. Dovresti imparare a trasformarla. (Ti consigliamo il codice vibrazionale PAPA) Come padre avrai la tendenza ad essere un genitore dinamico, che ama viaggiare e fare gite fuori porta.",

                2 => "GELO: Prendersi cura. Prendersi cura è un talento che deriva dall'albero genealogico del padre. È tipico di chi ha la tendenza a mettersi a servizio degli altri. Ti rende quindi una persona che tende ad essere attenta ai bisogni di chi ti sta vicino e molto disponibile alle richieste altrui. Dall'albero genealogico paterno potresti aver ereditato la tendenza ad un atteggiamento che diventa servile o all'immaturità. Dovresti imparare a trasformarla. (Ti consigliamo il codice vibrazionale INDIPENDENCE PAPA) Come padre avrai la tendenza ad essere molto accudente e ad ascoltare i tuoi figli.",

                3 => "ANELLI: Comunicare. Comunicare è un talento che deriva dall'albero genealogico paterno. La tua capacità di mediare nelle situazioni, ma anche di essere l'anima allegra della casa o della compagnia. Ti rende quindi una persona capace di tenere sempre vivo l'interesse di chi è al tuo fianco. Dall'albero genealogico potresti aver ereditato la tendenza ad essere molto dispersivo nell'attenzione che dai e a dare retta anche a persone poco affidabili. Dovresti imparare a trasformarla. (Ti consigliamo il codice vibrazionale STAY). Come padre potresti avere la tendenza a inserire bene i tuoi figli nella tua rete relazionale e ad aiutarli a districarsi nelle relazioni.",

                4 => "SEME: Importanza della famiglia. Dall'albero genealogico di tuo padre deriva la sensazione che senza una famiglia sulla quale appoggiarti tu faccia fatica a garantirti la sopravvivenza. Darai quindi importanza alla tua famiglia, oppure all'impresa per cui lavori o operi. Ovviamente questo ti rende molto affidabile. Devi stare molto attento a capire fino a che punto questo corrisponda ad un tuo vero bisogno o ad un'imposizione inconscia. Dovresti chiederti fino a che punto corrisponda alla tua verità interiore. (Ti consigliamo il codice vibrazionale INDIPENDENCE PAPA). Come padre potresti avere la tendenza a voler provvedere a tutti i bisogni dei tuoi figli, a non voler far mancare loro nulla.",

                5 => "FIORE: Idee liberali. Dall'albero genealogico di tuo padre potresti aver ereditato una certa mentalità liberale, poco tradizionale, che vede nella relazione un'esperienza importante e da vivere con grande entusiasmo piuttosto che un'istituzione sociale. Potresti però aver acquisito anche una certa tendenza a muoverti nella relazione in modo un po' adolescenziale, senza arrivare mai ad assumertene veramente la responsabilità. Ti farebbe bene andare verso una nuova maturità emotiva. (Ti consigliamo il codice INITIATION). Come padre potresti essere molto giocoso e divertente.",

                6 => "ALBERO: Capo famiglia. Dall'albero genealogico di tuo padre potresti aver ereditato il ruolo di capo famiglia. La capacità di gestire, di guidare. Questo tenderà a farti sentire molto responsabile rispetto a chi ritieni di dover proteggere. Potresti aver ereditato, però, anche una certa propensione all'autoritarismo. In questo caso ti consigliamo di iniziare a valutare di trasformare questa dinamica in autorevolezza. (Ti consigliamo il codice vibrazionale PAPA). Come padre avrai la tendenza a dare il buon esempio ai tuoi figli e a cercare di insegnare loro le regole per stare al mondo.",

                7 => "ACQUA: Onorare la memoria. La storia per te ha un valore importante, soprattutto quella che coinvolge la tua famiglia. Potresti quindi o portare avanti la memoria di storie familiari e avere il desiderio di farle proseguire con la tua vita o con la tua stirpe coinvolgendo le persone che ami. Potresti avere il desiderio di trovare una persona che come te crede nelle tradizioni. Potresti, però, faticare ad accettare la necessità altrui di cambiare direzione. Dovresti imparare ad accettare i cambiamenti. (Ti consigliamo il codice vibrazionale ACCEPT). Come padre avrai la tendenza ad insegnare ciò che per tradizione ritieni giusto.",

                8 => "SPECCHIO: Condividere sapere. La ricerca, la conoscenza hanno per te un valore importante. Lo hai ereditato dal tuo albero genealogico familiare. Hai quindi il desiderio di incontrare persone che come te amino conoscere, scoprire, pensare, discutere. Hai però ereditato anche una certa intolleranza per chi cade nell'errore rischiando di diventare insensibile al dolore altrui, anche a quello di chi ti è più vicino. Dovresti imparare ad essere più compassionevole ed empatico. (Ti consigliamo il codice EMPATHY). Come padre potresti essere molto stimolante, sempre pronto a dare spunto e direzione.",

                9 => "FULMINE: Voglia di essere d'aiuto. Dal tuo albero genealogico paterno hai ereditato la voglia di essere d'aiuto. Potresti quindi cercare persone che hanno bisogno d'aiuto o persone che come te hanno il desiderio di offrire il proprio aiuto e di farlo assieme. Devi stare attento a non attirare persone parassite e a non diventare crocerossino. (Ti consigliamo il codice vibrazionale MAMA). Come padre potresti essere molto attento ai bisogni dei tuoi figli e cercare di aiutarli nelle difficoltà.",
            ],
            "SOCIETA" => [
                1 => "CONQUISTA: Hai l'istinto predatore. Osservi la preda e la punti quando hai capito quali mosse fare. Lo fai in modo continuativo ma brioso, in modo da incuriosirla. Sai giocare con la preda e non molli finché non giungi alla conquista.",

                2 => "CURA DEI DETTAGLI: Avvicini in modo gentile, ti presenti in modo molto curato. I tuoi modi sono pacati e ami attrarre attraverso i piccoli particolari. Ti piace stupirla con piccoli dettagli che creano un'armonia d'insieme che la affascina.",

                3 => "INTERESSE: Ami attrarre attraverso la condivisione degli interessi. Spesso sei pure inconsapevole di attrarre. Potresti farlo limitandoti a vivere con passione e gioia quello che ti piace, esponendolo in modo gioioso e attraendola senza avere la chiara intenzione di farlo.",

                4 => "MOSTRARE IL PROPRIO VALORE: Cerchi di attrarre mostrando il valore che hai. Ti prendi cura di te, cerchi di presentarti bene. Cerchi di conoscere cose e condividerle destando interesse per ciò che fai o sai. Fai in modo che lei ti apprezzi e che desideri essere conquistata.",

                5 => "SIMPATIA: Il tuo modo di attrarre è attraverso la simpatia, il gioco, il divertimento. Cerchi di coinvolgerla in modo allegro e se ti piace potresti divertirti a punzecchiarla e a cercare di attrarre la sua attenzione con lo scherzo.",

                6 => "AFFIDABILITÀ: Il tuo modo di attrarre è facendola sentire al sicuro. Cerchi di farle capire che con te può lasciarsi andare, può permettersi di essere sé stessa senza maschere. Ami l'intimità sia fisica che emotiva e se puoi cerchi di trovare l'occasione per stare soli.",

                7 => "SENSUALITÀ: Il tuo modo di attrarre è attraverso il mistero, la parte più sensuale della vita. Ti piace giocare al chiaro-scuro, non rivelare mai troppo per non togliere l'aura di mistero che ti avvolge. Ti piace tenere la suspense e giocare con la sua psicologia.",

                8 => "PARLANDO: Tu conquisti parlando. Ti piace conoscerla, farle mille domande. Ti interessi a lei e cerchi di carpire più informazioni che puoi. Seduci facendole sentire il tuo interesse e ascolto. Non è detto che tu esprima molto di te, preferisci scoprirti in un secondo momento.",

                9 => "STUPENDO: Ti piace conquistare stupendola, facendole trovare ciò che le piace, oppure facendole fare esperienze mai fatte. Ami vedere lo stupore che si dipinge nel suo volto. Ti piace soprattutto sapere di avere intuito l'idea giusta.",
            ],

            "RICONOSCIMENTO" => [
                1 => "FUOCO +: vuoi che lei ti dimostri di credere in te, che si fidi delle decisioni che prendi, della direzione che dai e ti segua stando al tuo fianco, anche se doveste andare contro tutti gli altri. / FUOCO -: tu vuoi che lei si dimostri innamorata di te in modo passionale. Che ti faccia sentire il suo desiderio di te, che ti cerchi.",

                2 => "GELO +: vuoi che riconosca quanto amore e dedizione offri a lei. Che si accorga delle tante piccole attenzioni che sai avere e ti piacerebbe riceverle. / GELO -: vuoi essere semplicemente amato per quello che sei, senza tanti motivi, solo perché lei si è innamorata di te.",

                3 => "ANELLI +: vuoi che lei apprezzi la tua capacità di stare nel mondo e abbia la voglia di condividerlo con te. / ANELLI -: vuoi che lei apprezzi e condivida la tua visione particolare delle cose.",

                4 => "SEME +: hai bisogno di sapere che lei ti trovi bello, piacevole e che ammiri il modo in cui ti mostri nel mondo. / SEME -: hai bisogno che lei riconosca i tuoi talenti, quello che sai o che sai fare.",

                5 => "FIORE +: hai bisogno che lei ti trovi attraente e che ti dimostri che riconosce anche il fatto che lo sei anche per le altre. / FIORE -: vuoi che ti venga riconosciuto il fatto che tu sei capace di riconoscere i talenti che lei ha da mettere in campo e vuoi essere da stimolo perché si migliori.",

                6 => "ALBERO +: vuoi che ti venga riconosciuta la tua capacità di esserci sempre, di essere punto di riferimento e desideri che ti venga offerta la stessa cosa. / ALBERO -: vuoi che ti venga riconosciuto il valore che tu apporti nei progetti comuni, nel fatto che tu contribuisci sostanzialmente e desideri ricevere la gratificazione del tuo impegno.",

                7 => "ACQUA +: vuoi che ti venga riconosciuta la tua capacità di sentirla nel profondo e che lei si metta a disposizione di una comunicazione profonda. / ACQUA -: vuoi che ti venga riconosciuta la tua capacità di ascolto. Sai essere amico oltre che compagno e chiedi lo stesso a lei.",

                8 => "SPECCHIO +: vuoi che ti venga riconosciuta la tua capacità di essere equo nel dare e avere e desideri ricevere altrettanta equità. / SPECCHIO -: vuoi che ti venga riconosciuta la tua intelligenza e la tua capacità di analisi e comprensione.",

                9 => "FULMINE +: vuoi che ti venga riconosciuta la tua capacità di trasformare le situazioni negative in positive e la capacità di cambiare nel tempo. / FULMINE -: vuoi che ti venga riconosciuta la tua capacità di mantenere vive le tradizioni, di avere imparato ciò che ti è stato trasmesso.",
            ],
            "MAESTRO" => [
                1 => "FUOCO: Hai bisogno di sentirti unico e che la relazione ti accenda sempre. Se competi in amore vuoi vincere, ti piace catturare la preda. Ti piace che la persona ti faccia capire che prova passione per te. Tendi a spegnerti subito se ti si ignora e se la situazione non ti stimola.",

                2 => "GELO: Hai bisogno di sentirti unito alla persona che ami. Hai bisogno di sentire che siete una cosa sola, che se ci siete voi due tutto il resto non conta. Tendi però a stare appeso alle situazioni che non evolvono e a perdere tempo e occasioni.",

                3 => "ANELLI: Hai bisogno di sentirti ascoltato dalla persona che ami, ma anche e soprattutto di condividere passioni e di poter vivere insieme splendide avventure. Tendi però a distrarti dalla coppia o a causa di altre situazioni o a causa di interessi tuoi.",

                4 => "SEME: Hai bisogno di sentirti amato e di sentirlo anche fisicamente. Hai bisogno di sentirti avvolto dalla presenza dell'altra, meglio se in un contesto intimo e familiare. Potresti avere però troppo la proiezione della famiglia e meno del vivere l'amore.",

                5 => "FIORE: Hai bisogno di sentire che sei attraente. Ti piace vedere che le persone perdono la testa per te e quindi tendi a provocare per vedere le reazioni. Potresti però avere la difficoltà a controllare gli effetti di ciò che fai, perdere il contatto con i sentimenti dell'altra e quindi ferire involontariamente.",

                6 => "ALBERO: Hai bisogno di sentirti stabile nella relazione. Riesci a concederti veramente solo quando ti senti al sicuro, allora dai tantissimo e si può veramente fare affidamento su di te. Potresti avere però la tendenza alla gelosia, proprio per il tuo bisogno di non veder messe in discussione le tue sicurezze.",

                7 => "ACQUA: Hai bisogno di sentirti capito, ma soprattutto hai bisogno di sentire la profondità della relazione, che è una relazione speciale, unica. Una connessione animica profonda che va oltre lo spazio-tempo. In alcuni casi, però, potresti essere attratto dalla sessualità in modo ossessivo o dipendente e questo renderti succube della persona che hai davanti.",

                8 => "SPECCHIO: Hai bisogno di sentirti libero, hai quindi bisogno che la relazione che vivi ti conceda spazi di libertà, dove poterti ricaricare, tornare in te e donarti la voglia di essere nuovamente passionale con la persona che ami. Potresti però avere la pretesa di fare quello che vuoi senza ascoltare i bisogni dell'altra e questo portarti ad avere problemi di relazione.",

                9 => "FULMINE: Hai bisogno di sentire che la tua relazione è qualcosa di grandioso, oppure alla quale aspirare per gli altri, un esempio da seguire. Una relazione che si fonda su principi comuni, su ideali condivisi. Devi solo stare attento di non caricare di troppe aspettative la persona che hai di fronte, che altrimenti potrà solo deluderti.",
            ],
        ];
        $mappature_base = [
            "KARMA" => [
                1 => "trasformare la rabbia in passione",
                2 => "trasformare il blocco in presenza",
                3 => "trasformare l’ansia in opportunità",
                4 => "trasformare la mancanza in abbondanza",
                5 => "trasformare la superficialità in gioia",
                6 => "trasformare il bisogno di controllo in stabilità",
                7 => "trasformare il dolore in saggezza",
                8 => "trasformare il giudizio in compassione",
                9 => "trasformare la catastrofe in rinascita",
            ],
            "FAMIGLIA" => [
                1 => "Famiglia di leader e pionieri",
                2 => "Famiglia di mediatori e diplomatici",
                3 => "Famiglia di creativi e comunicatori",
                4 => "Famiglia di costruttori e lavoratori",
                5 => "Famiglia di avventurieri e liberi pensatori",
                6 => "Famiglia di protettori e guaritori",
                7 => "Famiglia di filosofi e mistici",
                8 => "Famiglia di imprenditori e organizzatori",
                9 => "Famiglia di idealisti e umanitari",
            ],
            "EGO" => [
                1 => "Ego forte e determinato",
                2 => "Ego sensibile e riservato",
                3 => "Ego espressivo e socievole",
                4 => "Ego disciplinato e metodico",
                5 => "Ego ribelle e indipendente",
                6 => "Ego responsabile e protettivo",
                7 => "Ego introspettivo e analitico",
                8 => "Ego ambizioso e carismatico",
                9 => "Ego altruista e compassionevole",
            ],
            "BISOGNO" => [
                1 => "Bisogno di indipendenza",
                2 => "Bisogno di armonia",
                3 => "Bisogno di espressione",
                4 => "Bisogno di stabilità",
                5 => "Bisogno di libertà",
                6 => "Bisogno di sicurezza",
                7 => "Bisogno di conoscenza",
                8 => "Bisogno di successo",
                9 => "Bisogno di contribuire al bene comune",
            ],
            "PUNTODEBOLE" => [
                1 => "Impulsività",
                2 => "Timidezza",
                3 => "Disorganizzazione",
                4 => "Rigidità",
                5 => "Inquietudine",
                6 => "Perfezionismo",
                7 => "Distanza emotiva",
                8 => "Autoritarismo",
                9 => "Tendenza al sacrificio",
            ],
            "MATERNA" => [
                1 => "Energica e protettiva",
                2 => "Dolce e accogliente",
                3 => "Comunicativa e stimolante",
                4 => "Solida e rassicurante",
                5 => "Creativa e gioiosa",
                6 => "Attenta e responsabile",
                7 => "Saggia e riflessiva",
                8 => "Determinata e forte",
                9 => "Intuitiva e trasformativa",
            ],
            "MAESTRO" => [
                1 => "Guida con passione",
                2 => "Insegna con empatia",
                3 => "Stimola con creatività",
                4 => "Istruisce con disciplina",
                5 => "Insegna con entusiasmo",
                6 => "Educa con responsabilità",
                7 => "Guida con saggezza",
                8 => "Forma con giustizia",
                9 => "Trasforma con ispirazione",
            ],
            "SOCIETA" => [
                1 => "Innovatore",
                2 => "Mediatore",
                3 => "Comunicatore",
                4 => "Realizzatore",
                5 => "Intrattenitore",
                6 => "Responsabile",
                7 => "Saggio",
                8 => "Giudice",
                9 => "Rivoluzionario",
            ],
            "RICONOSCIMENTO" => [
                1 => "Leader carismatico",
                2 => "Amico fidato",
                3 => "Oratore brillante",
                4 => "Creatore di valore",
                5 => "Anima della festa",
                6 => "Punto di riferimento",
                7 => "Consigliere saggio",
                8 => "Difensore della giustizia",
                9 => "Guida spirituale",
            ],
            "PUNTODIFORZA" => [
                1 => "Determinazione",
                2 => "Empatia",
                3 => "Comunicazione",
                4 => "Affidabilità",
                5 => "Creatività",
                6 => "Disciplina",
                7 => "Saggezza",
                8 => "Integrità",
                9 => "Visione",
            ],
            "PATERNA" => [
                1 => "Guida sicura",
                2 => "Presenza amorevole",
                3 => "Motivatore",
                4 => "Esempio di solidità",
                5 => "Anima libera",
                6 => "Protettore",
                7 => "Saggio maestro",
                8 => "Figura di autorità",
                9 => "Spirito ispiratore",
            ],
            "MISSIONE" => [
                1 => "Guidare con passione",
                2 => "Accogliere e proteggere",
                3 => "Unire e comunicare",
                4 => "Costruire con stabilità",
                5 => "Illuminare con creatività",
                6 => "Organizzare e gestire",
                7 => "Elevare la consapevolezza",
                8 => "Combattere per la giustizia",
                9 => "Trasformare e rigenerare",
            ],
            "CUORE" => [
                1 => "Farti sentire unic*",
                2 => "Coccolarti",
                3 => "Farti sentire ascoltat*",
                4 => "Farti sentire amat*",
                5 => "Farti divertire",
                6 => "Farti sentire al sicuro",
                7 => "Farti sentire la passione profonda",
                8 => "Farti perdere la testa",
                9 => "Farti sentire eccezionale",
            ],
        ];

        $mappature_studio = [
            "KARMA" => [
                1 => "Lo studente si trova a confrontarsi con la paura di brillare e mostrarsi. Tende a nascondere le proprie capacità per timore del giudizio o dell'esclusione. La sfida è imparare a gestire la propria energia senza spegnerla, trovando il coraggio di emergere e guidare. Spesso si manifesta come difficoltà a parlare in pubblico o a mostrarsi durante le interrogazioni, nonostante la preparazione.",
                2 => "La sfida principale è superare il perfezionismo paralizzante. Lo studente può essere così concentrato sul fare tutto perfettamente da bloccarsi e non riuscire a iniziare. Tende a procrastinare finché non è  sicuro di poter fare le cose in modo impeccabile. Deve imparare che l'apprendimento è un processo che include anche gli errori.",
                3 => "Il karma si manifesta nella difficoltà di mantenere la concentrazione e l'attenzione. Lo studente tende a disperdere le energie in troppe direzioni, faticando a focalizzarsi su un obiettivo specifico. La sfida è imparare a gestire la propria creatività e versatilità senza perdersi in mille rivoli.",
                4 => "La sfida karmika si presenta come una profonda insicurezza sulle proprie capacità, nonostante i talenti evidenti. Lo studente tende a sminuire i propri risultati e a dubitare costantemente delle proprie competenze. Deve imparare a riconoscere e valorizzare le proprie capacità pratiche e concrete.",
                5 => "Il karma si manifesta nella tendenza a prendere lo studio troppo alla leggera, cercando sempre la via più divertente e meno impegnativa. Lo studente deve imparare che l'apprendimento richiede anche momenti di serietà e impegno, senza perdere la propria naturale leggerezza.",
                6 => "La sfida principale è legata al controllo eccessivo sul processo di apprendimento. Lo studente tende a essere troppo rigido nei suoi metodi di studio, faticando ad adattarsi a nuove situazioni o approcci. Deve imparare a essere più flessibile pur mantenendo la sua naturale stabilità.",
                7 => "Il karma si manifesta nella tendenza a farsi travolgere dalle emozioni durante lo studio. Lo studente può essere così sensibile da assorbire anche l'ansia e lo stress degli altri, compromettendo il proprio rendimento. La sfida è imparare a gestire la propria sensibilità emotiva senza esserne sopraffatto.",
                8 => "La sfida karmika è legata alla tendenza a teorizzare troppo senza passare all'azione pratica. Lo studente può perdersi in ragionamenti complessi e analisi infinite, faticando a concretizzare lo studio in risultati tangibili. Deve imparare a bilanciare la sua capacità analitica con l'applicazione pratica.",
                9 => "Il karma si manifesta nella resistenza al sistema educativo tradizionale. Lo studente può sentirsi costantemente in conflitto con le regole e le strutture dell'apprendimento formale. La sfida è imparare a navigare nel sistema educativo mantenendo la propria indipendenza e spirito innovativo senza entrare in aperto conflitto.",
            ],
            "FAMIGLIA" => [
                1 => "L'ambiente familiare è caratterizzato da alte aspettative e spinte all'eccellenza. Lo studente cresce in un contesto dove il successo è fortemente valorizzato e spesso si sente spinto a primeggiare. La famiglia tende a enfatizzare i risultati visibili e i riconoscimenti pubblici, creando uno studente che può sentirsi costantemente sotto i riflettori o pressato a dimostrare il proprio valore attraverso i risultati accademici. Oppure può essere caratterizzata dalla non considerazione, spingendo lo studente a voler primeggiare.",
                2 => "L'ambiente familiare è formale e strutturato, con un forte accento sull'ordine e la disciplina nello studio. La famiglia valorizza l'eccellenza silenziosa e la precisione. Lo studente sviluppa un approccio metodico all'apprendimento, ma può sentirsi poco supportato emotivamente o troppo pressato verso la perfezione formale. Oppure essere troppo protetto e quindi non essere autonomo nel suo percorso di apprendimento. ",
                3 => "L'ambiente familiare è stimolante e variegato, con molti input culturali e intellettuali. La famiglia incoraggia la curiosità e la versatilità, ma può mancare di struttura e continuità. Lo studente sviluppa un approccio creativo e multidisciplinare, ma può faticare a trovare focus e disciplina. Oppure proviene da una cultura chiusa e particolare per cui fatica ad approcciarsi ad un ambiente aperto e comunicativo. ",
                4 => "L'ambiente familiare è pratico e concreto, orientato ai risultati tangibili. La famiglia valorizza l'impegno costante e il duro lavoro. Lo studente sviluppa un approccio pragmatico allo studio, ma può sentirsi poco valorizzato negli aspetti più creativi o teorici dell'apprendimento. Oppure avere la tendenza dare piu’ valore al lavoro che allo studio e quindi non valorizzare questo aspetto. ",
                5 => "L'ambiente familiare è leggero e poco strutturato riguardo allo studio. La famiglia tende a non dare eccessiva importanza ai risultati accademici, preferendo un approccio più spontaneo. Lo studente sviluppa un rapporto giocoso con l'apprendimento, ma può faticare quando serve maggiore disciplina e struttura. Oppure avere dei genitori poco stabili che spingono lo studente ad impegnarsi anche duramente per essere d’aiuto. ",
                6 => "L'ambiente familiare è molto strutturato e organizzato rispetto allo studio. La famiglia offre un forte sostegno pratico e organizzativo. Lo studente sviluppa ottime abitudini di studio, ma può sentirsi troppo controllato o dipendente dal supporto familiare. Oppure essersi dovuto organizzare da solo in quanto i genitori erano assenti, sentendosi caricato di responsabilità. ",
                7 => "L'ambiente familiare è emotivamente intenso, con forte enfasi sui legami e le tradizioni familiari. La famiglia tende a essere molto coinvolta emotivamente nel percorso di studio. Lo studente sviluppa una forte connessione emotiva con l'apprendimento, ma può faticare a separare le proprie aspirazioni da quelle familiari. Oppure una famiglia dove ci sono problematiche importanti che influenza emotivamente anche se non direttamente nello studio. ",
                8 => "L'ambiente familiare valorizza fortemente l'intelletto e la comprensione profonda. La famiglia stimola il pensiero critico e l'analisi. Lo studente sviluppa eccellenti capacità analitiche, ma può sentirsi pressato a dover sempre capire tutto perfettamente prima di procedere. Oppure una famiglia che non ha potuto accedere ad un certo grado di studi per cui lo studente si sente chiamato a colmare la mancanza. ",
                9 => "L'ambiente familiare è non convenzionale e spesso in contrasto con il sistema educativo tradizionale. La famiglia incoraggia l'indipendenza e il pensiero alternativo. Lo studente sviluppa un approccio originale all'apprendimento, ma può trovarsi in difficoltà nell'adattarsi alle strutture educative convenzionali. Oppure essere inserito in un ambiente iper-tradizionale che influenza il suo percorso di studi. ",
            ],
            "EGO" => [
                1 => "Passionale",
                2 => "Dolce",
                3 => "Comunicativa",
                4 => "Talentosa",
                5 => "Attraente",
                6 => "Rispettosa",
                7 => "Saggia",
                8 => "Corretta",
                9 => "Stoica",
            ],
            "BISOGNO" => [
                1 => "Bisogno di autonomia",
                2 => "Bisogno di sicurezza",
                3 => "Bisogno di espressione",
                4 => "Bisogno di stabilità",
                5 => "Bisogno di libertà",
                6 => "Bisogno di armonia",
                7 => "Bisogno di comprensione",
                8 => "Bisogno di equità",
                9 => "Bisogno di trasformazione",
            ],
            "PUNTODEBOLE" => [
                1 => "Impulsività",
                2 => "Timidezza",
                3 => "Disorganizzazione",
                4 => "Rigidità",
                5 => "Inquietudine",
                6 => "Perfezionismo",
                7 => "Distanza emotiva",
                8 => "Autoritarismo",
                9 => "Tendenza al sacrificio",
            ],
            "MATERNA" => [
                1 => "Energica e protettiva",
                2 => "Dolce e accogliente",
                3 => "Comunicativa e stimolante",
                4 => "Solida e rassicurante",
                5 => "Creativa e gioiosa",
                6 => "Attenta e responsabile",
                7 => "Saggia e riflessiva",
                8 => "Determinata e forte",
                9 => "Intuitiva e trasformativa",
            ],
            "MAESTRO" => [
                1 => "Guida con passione",
                2 => "Insegna con empatia",
                3 => "Stimola con creatività",
                4 => "Istruisce con disciplina",
                5 => "Insegna con entusiasmo",
                6 => "Educa con responsabilità",
                7 => "Guida con saggezza",
                8 => "Forma con giustizia",
                9 => "Trasforma con ispirazione",
            ],
            "SOCIETA" => [
                1 => "Innovatore",
                2 => "Mediatore",
                3 => "Comunicatore",
                4 => "Realizzatore",
                5 => "Intrattenitore",
                6 => "Responsabile",
                7 => "Saggio",
                8 => "Giudice",
                9 => "Rivoluzionario",
            ],
            "RICONOSCIMENTO" => [
                1 => "Leader carismatico",
                2 => "Amico fidato",
                3 => "Oratore brillante",
                4 => "Creatore di valore",
                5 => "Anima della festa",
                6 => "Punto di riferimento",
                7 => "Consigliere saggio",
                8 => "Difensore della giustizia",
                9 => "Guida spirituale",
            ],
            "PUNTODIFORZA" => [
                1 => "Determinazione",
                2 => "Empatia",
                3 => "Comunicazione",
                4 => "Affidabilità",
                5 => "Creatività",
                6 => "Disciplina",
                7 => "Saggezza",
                8 => "Integrità",
                9 => "Visione",
            ],
            "PATERNA" => [
                1 => "Guida sicura",
                2 => "Presenza amorevole",
                3 => "Motivatore",
                4 => "Esempio di solidità",
                5 => "Anima libera",
                6 => "Protettore",
                7 => "Saggio maestro",
                8 => "Figura di autorità",
                9 => "Spirito ispiratore",
            ],
            "MISSIONE" => [
                1 => "Guidare con passione",
                2 => "Accogliere e proteggere",
                3 => "Unire e comunicare",
                4 => "Costruire con stabilità",
                5 => "Illuminare con creatività",
                6 => "Organizzare e gestire",
                7 => "Elevare la consapevolezza",
                8 => "Combattere per la giustizia",
                9 => "Trasformare e rigenerare",
            ],
            "CUORE" => [
                1 => "Farti sentire unic*",
                2 => "Coccolarti",
                3 => "Farti sentire ascoltat*",
                4 => "Farti sentire amat*",
                5 => "Farti divertire",
                6 => "Farti sentire al sicuro",
                7 => "Farti sentire la passione profonda",
                8 => "Farti perdere la testa",
                9 => "Farti sentire eccezionale",
            ],
        ];

        
        $mappa_bambino_missione_talenti = [
            "KARMA" => [
                1 => "Trasformare la rabbia in passione",
                2 => "Assumersi responsabilità senza perdere l'innocenza",
                3 => "Trasformare l'ansia in opportunità",
                4 => "Trasformare l'insicurezza in fierezza",
                5 => "Trasformare la superficialità in gioia",
                6 => "Trasformare il bisogno di controllo in stabilità",
                7 => "Trasformare l'ipersensibilità in empatia",
                8 => "Gestire problemi di apprendimento o difficoltà ad adattarsi al ritmo degli altri",
                9 => "Trasformare il bisogno di gruppo in autonomia",
            ],
            "TALENTO" => [
                1 => "La capacità di entusiasmare gli altri.",
                2 => "Saggezza innata.",
                3 => "Grande intuizione.",
                4 => "Molteplici capacità da sviluppare.",
                5 => "Grande creatività.",
                6 => "Amore per la propria comunità.",
                7 => "Capacità di ascolto profondo.",
                8 => "Intelligenza 'altra' o intelligenza superiore alla media.",
                9 => "Capacità di aiuto e collaborazione.",
            ],
            "FAMIGLIA" => [
                1 => "Famiglia dinamica dove si gioca e si esplora",
                2 => "Famiglia accudente e affettuosa",
                3 => "Famiglia aperta e piena di amici",
                4 => "Famiglia confortevole e sicura",
                5 => "Famiglia gioiosa e creativa",
                6 => "Famiglia stabile e rassicurante",
                7 => "Famiglia dove si condividono valori importanti",
                8 => "Famiglia equa dove ognuno ha il suo spazio",
                9 => "Famiglia solidale che si aiuta sempre",
            ],
            "EGO" => [
                1 => "Ha bisogno di passione e entusiasmo",
                2 => "Ha bisogno di dolcezza e protezione",
                3 => "Vuole condividere interessi con gli altri",
                4 => "Vuole sentirsi utile e nel suo ruolo",
                5 => "Ama creare e divertirsi con gli altri",
                6 => "Desidera rispetto e stabilità",
                7 => "Cerca connessione profonda",
                8 => "Ama organizzare e capire",
                9 => "Vuole qualcosa di speciale che lasci il segno",
            ],
            "BISOGNO" => [
                1 => "Di agire con passione / di essere appassionata",
                2 => "Di accudire e sognare in tranquillità",
                3 => "Di comunicare e condividere",
                4 => "Di sicurezza e nutrimento affettivo",
                5 => "Di libertà e leggerezza",
                6 => "Di stabilità e non sentirsi sovraccaricata",
                7 => "Di empatia e di salvare dal dolore",
                8 => "Di essere riconosciuta e prevedere problemi",
                9 => "Di essere accettata e far accettare gli altri",
            ],
            "PUNTO_DEBOLE" => [
                1 => "Impazienza o bisogno di sentirsi desiderata",
                2 => "Superficialità o paura dell’abbandono",
                3 => "Ricerca eccessiva di esperienze o diffidenza",
                4 => "Insicurezza mascherata o ostentata",
                5 => "Incostanza o incapacità di difendersi",
                6 => "Tradimento o paura di essere tradita",
                7 => "Manipolazione o negazione del dolore",
                8 => "Paura di soffrire, cinismo o distanza",
                9 => "Esplosione o implosione emotiva",
            ],
            "MISSIONE" => [
                1 => "Amore puro",
                2 => "Amore adulto",
                3 => "Reincontrare l'amore",
                4 => "Sentire la pienezza dell'amore",
                5 => "Vivere la leggerezza dell'amore",
                6 => "L'amore libero",
                7 => "Vivere la trasformazione dell'amore",
                8 => "Riconoscere l'amore",
                9 => "Salvarti dall'amore",
            ],
            "CUORE" => [
                1 => "Farti sentire unica",
                2 => "Coccolarti",
                3 => "Farti sentire ascoltata",
                4 => "Farti sentire amata",
                5 => "Farti divertire",
                6 => "Farti sentire al sicuro",
                7 => "Farti sentire la passione profonda",
                8 => "Farti perdere la testa",
                9 => "Farti sentire eccezionale",
            ],
        ];
    
        $mappatura_lavoro = [
            "KARMA" => [
                1 => "Tendenza a bruciare troppo velocemente le energie e le risorse. Trasformazione: imparare a gestire le energie con equilibrio.",
                2 => "Eccessivo distacco emotivo che compromette le relazioni lavorative. Trasformazione: sviluppare empatia autentica.",
                3 => "Dispersione delle energie in troppi progetti simultanei. Trasformazione: imparare a focalizzarsi su ciò che conta.",
                4 => "Perfezionismo paralizzante che rallenta i processi. Trasformazione: accettare l’imperfezione come parte della crescita.",
                5 => "Superficialità nelle relazioni professionali. Trasformazione: sviluppare profondità nei legami.",
                6 => "Rigidità eccessiva nel mantenere le proprie posizioni. Trasformazione: coltivare flessibilità e apertura.",
                7 => "Tendenza ad assorbire troppo le emozioni altrui. Trasformazione: stabilire confini chiari.",
                8 => "Tendenza a riflettere troppo senza agire. Trasformazione: trovare equilibrio tra analisi e azione.",
                9 => "Impazienza che porta a saltare passaggi importanti. Trasformazione: sviluppare costanza e metodo.",
            ],
            "FAMIGLIA" => [
                1 => "Una famiglia che valorizza l’azione e la leadership.",
                2 => "Una famiglia che insegna il controllo emotivo e l’indipendenza.",
                3 => "Una famiglia che ha trasmesso capacità sociali e di adattamento.",
                4 => "Una famiglia che ha insegnato disciplina e precisione.",
                5 => "Una famiglia che ha valorizzato creatività ed espressione personale.",
                6 => "Una famiglia che ha trasmesso stabilità e responsabilità.",
                7 => "Una famiglia che ha insegnato sensibilità ed empatia.",
                8 => "Una famiglia che ha valorizzato la riflessione e l’analisi.",
                9 => "Una famiglia che ha trasmesso il valore del cambiamento e dell’innovazione.",
            ],
            "EGO" => [
                1 => "Determinato e impulsivo.",
                2 => "Razionale e distaccato.",
                3 => "Versatile e comunicativo.",
                4 => "Metodico e attento ai dettagli.",
                5 => "Creativo e affascinante.",
                6 => "Responsabile e protettivo.",
                7 => "Empatico e adattabile.",
                8 => "Intellettuale e perfezionista.",
                9 => "Ribelle e innovativo.",
            ],
            "BISOGNO" => [
                1 => "Di agire con passione / Essere motivato.",
                2 => "Di stabilità emotiva / Sicurezza.",
                3 => "Di comunicare e connettersi / Sentirsi incluso.",
                4 => "Di controllo e struttura / Sentirsi utile.",
                5 => "Di libertà e leggerezza / Espressione autentica.",
                6 => "Di sicurezza e ordine / Protezione.",
                7 => "Di comprensione e accettazione / Equilibrio emotivo.",
                8 => "Di eccellenza e riconoscimento / Autenticità.",
                9 => "Di indipendenza e cambiamento / Sfide stimolanti.",
            ],
            "PUNTO_DEBOLE" => [
                1 => "Impazienza e impulsività.",
                2 => "Difficoltà nel connettersi emotivamente.",
                3 => "Tendenza a disperdere energie.",
                4 => "Rigidità mentale e perfezionismo.",
                5 => "Superficialità e paura del conflitto.",
                6 => "Controllo eccessivo e difficoltà a delegare.",
                7 => "Mancanza di confini e ipersensibilità.",
                8 => "Analisi eccessiva e paura del giudizio.",
                9 => "Insofferenza alle regole e instabilità.",
            ],
            "MISSIONE" => [
                1 => "Trovare equilibrio tra azione e riflessione.",
                2 => "Unire empatia e razionalità nel lavoro.",
                3 => "Utilizzare la versatilità con discernimento.",
                4 => "Accettare il cambiamento senza perdere stabilità.",
                5 => "Trovare profondità oltre l’apparenza.",
                6 => "Lasciare andare il controllo e accettare l’evoluzione.",
                7 => "Imparare a proteggere la propria energia.",
                8 => "Trovare un equilibrio tra introspezione e azione.",
                9 => "Usare l’innovazione in modo costruttivo.",
            ],
            "CUORE" => [
                1 => "Farti sentire speciale e motivato.",
                2 => "Offrirti sicurezza emotiva.",
                3 => "Coinvolgerti con leggerezza e dinamismo.",
                4 => "Creare una base solida e affidabile.",
                5 => "Portarti gioia e ispirazione.",
                6 => "Darti stabilità e protezione.",
                7 => "Comprendere profondamente i tuoi sentimenti.",
                8 => "Stimolarti intellettualmente e spiritualmente.",
                9 => "Accendere il tuo entusiasmo e la tua energia.",
            ],
        ];
        $mappature = [];
        if (strpos($slug_mappa, "studio") !== false) {
            $mappature = $mappature_studio;
        } elseif (strpos($slug_mappa, "amore") !== false) {
            if (strpos($sesso, "uomo") !== false) {
                $mappature = $mappatura_amore_uomo;
            } else {
                $mappature = $mappature_amore_donna;
            }
        } elseif (strpos($slug_mappa, "bambino_missione_talenti") !== false) {
            $mappature = $mappa_bambino_missione_talenti; 
        } elseif (strpos($slug_mappa, "lavoro") !== false) {
            $mappature = $mappatura_lavoro; 
        } else {
            $mappature = $mappature_base;
        }

        $solution = is_array($solution) ? $solution : [];

        $valori = [];
        foreach ($mappature as $chiave => $valori_mappa) {
            if ($chiave === "KARMA") {
                // Normalizza il numero karma: positivo e intero
                $indice = abs(round($karmaNumber)); // Es: -3 -> 3

                // Se l'indice non esiste nella mappa, fallback
                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } elseif ($chiave === "FAMIGLIA") {
                // Usa direttamente il numero della famiglia passato alla funzione
                $indice = abs(round($famiglianumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } elseif ($chiave === "EGO") {
                // Usa direttamente il numero della famiglia passato alla funzione
                $indice = abs(round($egonumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } elseif ($chiave === "BISOGNO") {
                $indice = abs(round($bisgognonumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } elseif ($chiave === "PUNTO_DEBOLE") {
                $indice = abs(round($puntodebolenumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } else if ($chiave === "MISSIONE") {
                $indice = abs(round($missionenumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } else if ($chiave === "MAESTRO") {
                $indice = abs(round($maestronumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } else if ($chiave === "CUORE") {
                $indice = abs(round(num: $cuorenumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } else if ($chiave === "MATERNA") {
                $indice = abs(round(num: $maternanumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            } else if ($chiave === "SOCIETA") {
                $indice = abs(round(num: $societanumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            }
            else if($chiave==="PATERNA"){
                 $indice = abs(round(num: $paternanumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            }
            else if($chiave==="PUNTODIFORZA"){
                
                 $indice = abs(round(num: $puntodiforzanumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            }
            else if($chiave=="RICONOSCIMENTO"){
                
                 $indice = abs(round(num: $riconoscimentonumber));

                if (!isset($valori_mappa[$indice])) {
                    $indice = array_key_first($valori_mappa);
                }
            }
            if ($indice !== null && isset($valori_mappa[$indice])) {
                $valori[$chiave] = $valori_mappa[$indice];
            } else {
                $valori[$chiave] = reset($valori_mappa);
            }
        }

        return $valori;
    }

    public function handle_map_registration()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book"])) {
            if (
                isset($_SESSION["last_submit"]) &&
                time() - $_SESSION["last_submit"] < 30
            ) {
                return;
            }
            $_SESSION["last_submit"] = time();
            $nome = sanitize_text_field($_POST["nome"]);
            $cognome = sanitize_text_field($_POST["cognome"]);
            $email = sanitize_email($_POST["email"]);
            $sesso = sanitize_text_field($_POST["sesso"]);
            $slug_mappa = sanitize_text_field($_POST["slug_mappa"]);
            $lingua = sanitize_text_field($_POST["lingua"]);
            $data_nascita_utente = sanitize_text_field(
                $_POST["data_di_nascita_utente"]
            );
            $data_di_nascita_madre = sanitize_text_field(
                $_POST["data_di_nascita_madre"]
            );
            $data_di_nascita_padre = sanitize_text_field(
                $_POST["data_di_nascita_padre"]
            );
            $accettazione_privacy = sanitize_text_field(
                $_POST["accettazione_privacy"]
            );
            $utente_result = reduce_date_to_single_digit_details(
                $data_nascita_utente
            );
            $madre_result = reduce_date_to_single_digit_details(
                $data_di_nascita_madre
            );
            $padre_result = reduce_date_to_single_digit_details(
                $data_di_nascita_padre
            );
            $nome = sanitize_text_field($_POST["nome"]);

            $other_result = other_details(
                $data_nascita_utente,
                $data_di_nascita_madre,
                $data_di_nascita_padre
            );
            $solution = get_solution(
                $slug_mappa,
                $lingua,
                $utente_result,
                $madre_result,
                $padre_result,
                $other_result
            );
            $post_title = "Mappa Talenti: " . $nome . " " . $cognome;
            $karmaNumber = $other_result["comi"];

            $valori = $this->assegnare_valori(
                $solution,
                $slug_mappa,
                $sesso,
                karmaNumber: $karmaNumber,
                famiglianumber: $utente_result["mese"],
                egonumber: $utente_result["giorno"],
                bisgognonumber: $utente_result["giorno"],
                puntodebolenumber: $utente_result["mese-meno-giorno"],
                missionenumber: $utente_result["totale"],
                cuorenumber: $utente_result["anno-meno-mese"],
                maestronumber: $other_result["cogi"],
                maternanumber: $utente_result["anno-meno-mese"],
                societanumber: $utente_result["anno"],
                paternanumber: $padre_result["totale"],
                puntodiforzanumber: $other_result["u-totale-piu-u-anni"],
                riconoscimentonumbe: $other_result["p-totale-piu-u-totale"],
            );

            $karma = $valori["KARMA"];
            $famiglia = $valori["FAMIGLIA"];
            $ego = $valori["EGO"];
            $bisogno = $valori["BISOGNO"];
            $puntodebole = $valori["PUNTODEBOLE"];
            $materna = $valori["MATERNA"];
            $maestro = $valori["MAESTRO"];
            $societa = $valori["SOCIETA"];
            $riconoscimento = $valori["RICONOSCIMENTO"];
            $puntodiforza = $valori["PUNTODIFORZA"];
            $paterna = $valori["PATERNA"];
            $missione = $valori["MISSIONE"];
            $cuore = $valori["CUORE"];

            $post_data = [
                "post_title" => $post_title,
                "post_type" => "mappa",
                "post_status" => "publish",
                "post_author" => get_current_user_id(),
                "post_content" => $karma,
            ];
            $post_id = wp_insert_post($post_data);
            if ($post_id != 0) {
                update_post_meta($post_id, "section1", $karma);
                update_post_meta($post_id, "section2", $famiglia);
                update_post_meta($post_id, "section3", $ego);
                update_post_meta($post_id, "section4", $cuore);
                update_post_meta($post_id, "section5", $bisogno);
                update_post_meta($post_id, "section6", $puntodebole);
                update_post_meta($post_id, "section7", $materna);
                update_post_meta($post_id, "section8", $maestro);
                update_post_meta($post_id, "section9", $societa);
                update_post_meta($post_id, "section10", $riconoscimento);
                update_post_meta($post_id, "section11", $puntodiforza);
                update_post_meta($post_id, "section12", $paterna);
                update_post_meta($post_id, "section13", $missione);
            }

            // Controlla se il post è stato creato correttamente
            if ($post_id != 0) {
                // Imposta i campi ACF con i valori corrispondenti
                update_field("nome", strtoupper($nome), $post_id);
                update_field("cognome", strtoupper($cognome), $post_id);
                update_field("sesso", $sesso, $post_id);
                update_field("email", $email, $post_id);

                $date_object = \DateTime::createFromFormat(
                    "d/m/Y",
                    $data_nascita_utente
                );
                if ($data_nascita_utente !== false) {
                    $data_nascita_utente = $date_object->format("Y-m-d");
                    update_field(
                        "data_di_nascita_utente",
                        $data_nascita_utente,
                        $post_id
                    );
                }

                $date_object = \DateTime::createFromFormat(
                    "d/m/Y",
                    $data_di_nascita_madre
                );
                if ($data_di_nascita_madre !== false) {
                    $data_di_nascita_madre = $date_object->format("Y-m-d");
                    update_field(
                        "data_di_nascita_madre",
                        $data_di_nascita_madre,
                        $post_id
                    );
                }

                $date_object = \DateTime::createFromFormat(
                    "d/m/Y",
                    $data_di_nascita_padre
                );
                if ($data_di_nascita_padre !== false) {
                    $data_di_nascita_padre = $date_object->format("Y-m-d");
                    update_field(
                        "data_di_nascita_padre",
                        $data_di_nascita_padre,
                        $post_id
                    );
                }

                update_field("lingua", $lingua, $post_id);
                update_field("slug_mappa", $slug_mappa, $post_id);

                update_field(
                    "utente_totale",
                    $utente_result["totale"],
                    $post_id
                );
                update_field("madre_totale", $madre_result["totale"], $post_id);
                update_field("padre_totale", $padre_result["totale"], $post_id);

                update_field("utente_anno", $utente_result["anno"], $post_id);
                update_field("madre_anno", $madre_result["anno"], $post_id);
                update_field("padre_anno", $padre_result["anno"], $post_id);

                update_field("utente_mese", $utente_result["mese"], $post_id);
                update_field("madre_mese", $madre_result["mese"], $post_id);
                update_field("padre_mese", $padre_result["mese"], $post_id);

                update_field(
                    "utente_giorno",
                    $utente_result["giorno"],
                    $post_id
                );
                update_field("madre_giorno", $madre_result["giorno"], $post_id);
                update_field("padre_giorno", $padre_result["giorno"], $post_id);

                update_field(
                    "u-anno-meno-u-mese",
                    $utente_result["anno-meno-mese"],
                    $post_id
                ); //pos 6
                update_field(
                    "u-mese-meno-u-giorno",
                    $utente_result["mese-meno-giorno"],
                    $post_id
                ); //pos 10

                update_field(
                    "u-giorno-meno-m-totale",
                    $other_result["u-giorno-meno-m-totale"],
                    $post_id
                ); //pos 11
                update_field(
                    "p-totale-piu-u-totale",
                    $other_result["p-totale-piu-u-totale"],
                    $post_id
                ); //pos 12
                update_field(
                    "u-totale-piu-u-anni",
                    $other_result["u-totale-piu-u-anni"],
                    $post_id
                ); //pos 13
                update_field("comi", $other_result["comi"], $post_id); //pos 13 KARMA
                update_field("cogi", $other_result["cogi"], $post_id); //pos 13 Maestro

                update_field(
                    "accettazione_privacy",
                    $accettazione_privacy,
                    $post_id
                );

                $download_link = do_shortcode(
                    '[e2pdf-download id="1" dataset="' . $post_id . '"]'
                );
                $download_url = do_shortcode(
                    '[e2pdf-download id="1" output="url" dataset="' .
                    $post_id .
                    '"]'
                );
                $data_di_nascita_madre_txt = $data_di_nascita_madre
                    ? $data_di_nascita_madre
                    : "data non inserita";
                $data_di_nascita_padre_txt = $data_di_nascita_padre
                    ? $data_di_nascita_padre
                    : "data non inserita";

                //prendo i campi nella giusta lingua
                if ($lingua == "EN"):
                    $oggetto_email = get_field("oggetto_email_en", "option");
                    $corpo_email = get_field("corpo_email_en", "option");
                    $footer_email = get_field("footer_email_en", "option");
                    $label_punteggio = "Score obtained";
                    $label_risultati = "This is the interpretation of your map";
                    $label_download = "To download your map";
                else:
                    $oggetto_email = get_field("oggetto_email", "option");
                    $corpo_email = get_field("corpo_email", "option");
                    $footer_email = get_field("footer_email", "option");
                    $label_punteggio = "Punteggio ottenuto";
                    $label_risultati =
                        'Questa è l\'interpretazione della tua mappa';
                    $label_download = "Per scaricare la tua mappa";
                endif;

                global $wpdb;

                $lingua_corrente = $lingua === "EN" ? "EN" : "ITA";

                $etichette = $wpdb->get_results(
                    $wpdb->prepare(
                        "SELECT slug_mappa_et, etichetta
    FROM wp_mappe_etichette
    WHERE lingua_et = %s",
                        $lingua_corrente
                    ),
                    ARRAY_A
                );

                $etichette_map = [];
                foreach ($etichette as $etichetta) {
                    $etichette_map[$etichetta["slug_mappa_et"]] =
                        $etichetta["etichetta"];
                }
                $solution_content = "<h3>" . $label_risultati . ":</h3>";
                foreach ($solution as $item) {
                    if (isset($item["domanda"])) {
                        $nome_entita = isset(
                            $etichette_map[$item["slug_entita"]]
                        )
                            ? $etichette_map[$item["slug_entita"]]
                            : $item["slug_entita"];

                        $solution_content .=
                            '<h3 style="background-color: #eee;padding: 3px 12px; margin-bottom:0">' .
                            esc_html($nome_entita) .
                            "</h3>";
                        $solution_content .=
                            '<p style="padding:3px 6px; border:1px solid #eee; margin-bottom:0">' .
                            esc_html($item["domanda"]) .
                            "";
                    }
                    if (isset($item["risposta"])) {
                        $solution_content .=
                            "" .
                            $label_punteggio .
                            ": " .
                            esc_html($item["punteggio"]) .
                            "";
                        $solution_content .=
                            esc_html($item["risposta"]) . "</p>";
                    }
                }

                $subject_user = get_field("oggetto_email", "option")
                    ? get_field("oggetto_email", "option")
                    : "Riepilogo Mappa Talenti";
                $message_user =
                    '
    <!doctype html>
    <html lang="it">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>' .
                    $subject_user .
                    '</title>
        <style media="all" type="text/css">
        body {
            font-family: Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 16px;
            line-height: 1.5;
            background-color: #f4f5f6;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 0 auto;
            max-width: 600px;
            padding: 24px;
            width: 100%;
        }

        .main {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 24px;
            text-align: center;
        }

        .header img {
            max-width: 200px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #333;
            margin-bottom: 16px;
        }

        .download-box {
            background: #e8f0fe;
            padding: 12px;
            border-radius: 8px;
            margin-top: 15px;
            display: inline-block;
        }

        .download-box a {
            font-size: 16px;
            color: #0867ec;
            font-weight: bold;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            color: #7d7d7d;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="main">
                <!-- Logo -->
                <div class="header">
                    <img src="https://ninenergymap.com/logo.png" alt="Ninenergy Logo">
                </div>

                <!-- Corpo Email -->
                ' .
                    ($corpo_email
                        ? $corpo_email
                        : "<h1 style='font-size:18px'>Grazie per aver compilato la Mappa Talenti</h1>") .
                    '
                ' .
                    $solution_content .
                    '

                <!-- Download -->
                <div class="download-box">
                    <p><b>' .
                    $label_download .
                    '</b></p>
                    <p><span class="dwnButton">' .
                    $download_link .
                    '</span></p>
                </div>
            </div>

            <!-- Footer -->
            ' .
                    ($footer_email
                        ? '<div class="footer">
                <p>' .
                        $footer_email .
                        "</p>
            </div>"
                        : "") .
                    '
        </div>
    </body>

    </html>';

                $headers = ["Content-Type: text/html; charset=UTF-8"];

                wp_mail($email, $subject_user, $message_user, $headers);

                $admin_email = get_field(
                    "email_notifica_compilazione",
                    "option"
                )
                    ? get_field("email_notifica_compilazione", "option")
                    : "alessandro@eklettica.it";
                $subject_admin = "Nuova Mappa Talenti Creata";
                $message_admin =
                    "Un utente ha creato una nuova Mappa Talenti.\n\n";
                $message_admin .= "Nome: " . $nome . "\n";
                $message_admin .= "Cognome: " . $cognome . "\n";
                $message_admin .= "E-mail: " . $email . "\n";
                $message_admin .= "Sesso: " . $sesso . "\n";
                $message_admin .=
                    "Data di nascita: " . $data_nascita_utente . "\n";
                $message_admin .=
                    "Data di nascita madre: " .
                    $data_di_nascita_madre_txt .
                    "\n";
                $message_admin .=
                    "Data di nascita padre: " .
                    $data_di_nascita_padre_txt .
                    "\n\n";
                $message_admin .=
                    "Scarica la mappa da qui: " . $download_link . "\n";

                wp_mail($admin_email, $subject_admin, $message_admin);

                if ($lingua == "EN"):
                    $pagina_conferma = get_field(
                        "pagina_conferma_en",
                        "option"
                    );
                else:
                    $pagina_conferma = get_field(
                        "pagina_conferma_it",
                        "option"
                    );
                endif;
                wp_redirect("/grazie-per-la-mappa/");
                exit();
            }
        }
    }
}