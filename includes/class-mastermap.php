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
                '<input class="form-control" type="text" id="data_di_nascita_utente" name="data_di_nascita_utente" required placeholder="gg/mm/aaaa" pattern="\d{1,2}/\d{1,2}/\d{4}">';

            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_madre">Your mother\'s date of birth</label>';
            $form .=
                '<input class="form-control" type="text"  id="data_di_nascita_madre" name="data_di_nascita_madre" placeholder="gg/mm/aaaa" pattern="\d{1,2}/\d{1,2}/\d{4}">';
            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_padre">Your father\'s date of birth</label>';
            $form .=
                '<input class="form-control" type="text" id="data_di_nascita_padre" name="data_di_nascita_padre" placeholder="gg/mm/aaaa" pattern="\d{1,2}/\d{1,2}/\d{4}">';
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
                '<input class="form-control" type="text" id="data_di_nascita_utente" name="data_di_nascita_utente" required placeholder="gg/mm/aaaa" pattern="\d{1,2}/\d{1,2}/\d{4}">';

            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_madre">' .
                __("Data di nascita di tua madre", "ek_mappa") .
                "</label>";
            $form .=
                '<input class="form-control" type="text"  id="data_di_nascita_madre" name="data_di_nascita_madre" placeholder="gg/mm/aaaa" pattern="\d{1,2}/\d{1,2}/\d{4}">';
            $form .= "</div>";
            $form .= '<div class="col-md-4 mb-2">';
            $form .=
                '<label for="data_di_nascita_padre">' .
                __("Data di nascita di tuo padre", "ek_mappa") .
                "</label>";
            $form .=
                '<input class="form-control" type="text" id="data_di_nascita_padre" name="data_di_nascita_padre" placeholder="gg/mm/aaaa" pattern="\d{1,2}/\d{1,2}/\d{4}">';
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

        // Applica la funzione a tutti i campi data
        $form .= 'addDateSlashes("data_di_nascita_utente");';
        $form .= 'addDateSlashes("data_di_nascita_madre");';
        $form .= 'addDateSlashes("data_di_nascita_padre");';

        $form .= "</script>";
        return $form;
    }
    public function assegnare_valori($solution, $slug_mappa)
    {
        // Definizione delle mappature
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

        $mappature_amore_donna = [
            "KARMA" => [
                1 => "Bisogno compulsivo del sesso/rifiuto del sesso... Trasformazione: contattare la rabbia e iniziare a 'sentire' veramente l’altro.",
                2 => "Bisogno estremo di attenzioni... Trasformazione: diventare emotivamente adulta.",
                3 => "Attrai relazioni karmiche... Trasformazione: accettare l’aspetto destinico.",
                4 => "Bisogno di sicurezza... Trasformazione: contattare il senso del tuo valore.",
                5 => "Bisogno di attrarre... Trasformazione: imparare la responsabilità emotiva.",
                6 => "Bisogno di stabilità... Trasformazione: trasformare il bisogno di controllo.",
                7 => "Bisogno di empatia... Trasformazione: entrare in contatto con il proprio dolore.",
                8 => "Bisogno di eccellenza... Trasformazione: ricollegarti al tuo sogno.",
                9 => "Colpo di fulmine... Trasformazione: imparare a gestire gli impulsi.",
            ],
            "FAMIGLIA" => [
                1 => "Una famiglia in movimento... Non mettere al mondo figli perché ci si aspetta questo da te.",
                2 => "Una famiglia accudente... La casa è un luogo sacro per te.",
                3 => "Una famiglia allargata... L'amicizia è un grande valore per te.",
                4 => "Una famiglia confortevole... Attenzione a non mettere i figli al centro del tuo mondo.",
                5 => "Famiglia giocosa... Alleggerire il quotidiano con soluzioni creative.",
                6 => "Una famiglia stabile... Hai bisogno di rapporti stabili e duraturi.",
                7 => "Una famiglia che trasmette valori... Importante che i valori siano condivisi.",
                8 => "Una famiglia equa... Hai bisogno dei tuoi spazi di libertà.",
                9 => "Una famiglia che si aiuta... Importante saper scegliere bene.",
            ],
            "EGO" => [
                1 => "Passionale... Soffri molto se l’altra persona ostacola le tue passioni.",
                2 => "Dolce... Soffri se la persona è assente o non mostra cura.",
                3 => "Social... Vivi la coppia all’interno di contesti aperti.",
                4 => "Famiglia... Per te la coppia è mutuo soccorso.",
                5 => "Creativa... Hai bisogno di progettualità condivisa.",
                6 => "Rispettosa... Vuoi sentirti profondamente rispettata.",
                7 => "Fusionale... Offri comprensione e vicinanza.",
                8 => "Intelligente... Vuoi organizzare la coppia secondo le tue priorità.",
                9 => "Che ti sconvolga la vita... Hai bisogno di una relazione trasformativa.",
            ],
            "BISOGNO" => [
                1 => "Di agire con passione / Che ti si faccia appassionare.",
                2 => "Di accudimento, dimenticare i problemi / Comodità, poter sognare.",
                3 => "Sapere, essere al corrente / Comunicare, parlare.",
                4 => "Status, sentirti nel giusto ruolo / Nutrimento anche affettivo.",
                5 => "Divertimento / Libertà.",
                6 => "Avere il controllo / Non sentirsi sovraccaricate.",
                7 => "Essere capite nel proprio dolore / Salvare gli altri dal dolore.",
                8 => "Essere importante / Prevedere i problemi.",
                9 => "Essere accettate / Far accettare gli altri o situazioni.",
            ],
            "PUNTODEBOLE" => [
                1 => "Quando le cose non procedono velocemente / Quando non ti senti desiderata.",
                2 => "Superficialità / Paura dell’abbandono.",
                3 => "Ricerca dell’esperienza / Diffidenza.",
                4 => "Insicurezza (non si mostra) / Insicurezza (vuole essere vista).",
                5 => "Incostanza / Non sa difendersi.",
                6 => "Tradimento, irresponsabilità / Paura del tradimento.",
                7 => "Manipolazione (cerca di essere aiutata) / Non vuole mostrare il dolore.",
                8 => "Paura di soffrire (cinismo) / Paura di soffrire (educazione).",
                9 => "Paura di fare male (scoppiare) / Implosione (di non farcela).",
            ],
            "MATERNA" => [
                1 => "Erediti il bisogno di libertà ed espressione erotica. Attenta alla rabbia verso gli uomini.",
                2 => "Erediti la capacità di accudire. Attenta alla ricerca del padre nel partner.",
                3 => "Erediti la comunicazione. Attenta a non nascondere i tuoi bisogni.",
                4 => "Erediti dolcezza e affetto. Attenta al bisogno di rassicurazioni.",
                5 => "Erediti la capacità seduttiva. Attenta alla vergogna o esibizionismo eccessivo.",
                6 => "Erediti la solidità. Attenta alla gelosia o al bisogno di controllo.",
                7 => "Erediti il sostegno. Attenta al dolore ereditato non risolto.",
                8 => "Erediti l’intelletto. Attenta alle ingiustizie vissute da tua madre.",
                9 => "Erediti la capacità di resistere. Attenta alla paura dell’imprevisto.",
            ],
            "MAESTRO" => [
                1 => "Unica e appassionata.",
                2 => "Molto affettiva.",
                3 => "Avventurosa.",
                4 => "Costruttiva.",
                5 => "Divertente.",
                6 => "Stabile.",
                7 => "Romantica e intensa.",
                8 => "Libera.",
                9 => "Grandiosa.",
            ],
            "SOCIETA" => [
                1 => "Conquista.",
                2 => "Cura dei dettagli.",
                3 => "Interesse.",
                4 => "Mostrare il proprio valore.",
                5 => "Simpatia.",
                6 => "Affidabilità.",
                7 => "Sensualità.",
                8 => "Parlando.",
                9 => "Stupendo.",
            ],
            "RICONOSCIMENTO" => [
                1 => "Che ti segua / Che si dimostri innamorato.",
                2 => "Per la cura che offri / Che sei amabile come sei.",
                3 => "Per la tua capacità di stare nel mondo / Per la tua visione particolare.",
                4 => "Per l'immagine che dai / Per le tue conoscenze.",
                5 => "Per il tuo fascino / Per la tua capacità di farlo esprimere.",
                6 => "Per la tua capacità di esserci / Per la tua attitudine a fare insieme.",
                7 => "Per la tua capacità di sentire / Per la tua capacità di ascoltare.",
                8 => "Per la tua equità / Per la tua intelligenza.",
                9 => "Per la capacità di trasformare / Perché mantieni le tradizioni.",
            ],
            "PUNTODIFORZA" => [
                1 => "Passione o progetti condivisi.",
                2 => "Calma o riposo.",
                3 => "Dialogo o fare insieme.",
                4 => "Contatto fisico o fare cose piacevoli.",
                5 => "Gioco a due o divertimento.",
                6 => "Solitudine o isolamento con il partner.",
                7 => "Sostegno o sensibilità.",
                8 => "Analisi o visione a lungo termine.",
                9 => "Pazienza o educare al cambiamento.",
            ],
            "PATERNA" => [
                1 => "Cerchi un uomo passionale.",
                2 => "Cerchi un uomo calmo e accudente.",
                3 => "Cerchi un uomo stimolante.",
                4 => "Cerchi un uomo curato.",
                5 => "Cerchi un uomo spiritoso.",
                6 => "Cerchi un uomo solido e responsabile.",
                7 => "Cerchi un uomo che si prenda cura di te.",
                8 => "Cerchi un uomo intelligente.",
                9 => "Cerchi un uomo imprevedibile.",
            ],
            "MISSIONE" => [
                1 => "Amore puro.",
                2 => "Amore adulto.",
                3 => "Reincontrare l’amore.",
                4 => "Sentire la pienezza dell’amore.",
                5 => "Vivere la leggerezza dell’amore.",
                6 => "Amore libero.",
                7 => "Trasformazione dell’amore.",
                8 => "Riconoscere l’amore.",
                9 => "Salvarti dall’amore.",
            ],
            "CUORE" => [
                1 => "Farti sentire unica.",
                2 => "Coccolarti.",
                3 => "Farti sentire ascoltata.",
                4 => "Farti sentire amata.",
                5 => "Farti divertire.",
                6 => "Farti sentire al sicuro.",
                7 => "Farti sentire la passione profonda.",
                8 => "Farti perdere la testa.",
                9 => "Farti sentire eccezionale.",
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
        $mappatura_amore_uomo = [
            "KARMA" => [
                1 => "Bisogno compulsivo del sesso/rifiuto del sesso. Trasformazione: contattare la rabbia e iniziare a 'sentire' veramente l’altro.",
                2 => "Bisogno estremo di attenzioni. Trasformazione: diventare emotivamente adulto.",
                3 => "Attrai relazioni karmiche. Trasformazione: accettare l’aspetto destinico.",
                4 => "Bisogno di sicurezza. Trasformazione: contattare il senso del tuo valore.",
                5 => "Bisogno di attrarre. Trasformazione: imparare la responsabilità emotiva.",
                6 => "Bisogno di stabilità. Trasformazione: trasformare il bisogno di controllo.",
                7 => "Bisogno di empatia. Trasformazione: entrare in contatto con il proprio dolore.",
                8 => "Bisogno di eccellenza. Trasformazione: ricollegarti al tuo sogno.",
                9 => "Colpo di fulmine. Trasformazione: imparare a gestire gli impulsi.",
            ],
            "FAMIGLIA" => [
                1 => "Una famiglia in movimento",
                2 => "Una famiglia accudente",
                3 => "Una famiglia allargata",
                4 => "Una famiglia confortevole",
                5 => "Famiglia giocosa",
                6 => "Una famiglia stabile",
                7 => "Una famiglia che trasmette valori",
                8 => "Una famiglia equa",
                9 => "Una famiglia che si aiuta",
            ],
            "EGO" => [
                1 => "Passionale",
                2 => "Dolce",
                3 => "Social",
                4 => "Famiglia",
                5 => "Creativa",
                6 => "Rispettosa",
                7 => "Fusionale",
                8 => "Intelligente",
                9 => "Che ti sconvolga la vita",
            ],
            "BISOGNO" => [
                1 => "Di agire con passione / Che ti si faccia appassionare",
                2 => "Di accudimento / Comodità, poter sognare",
                3 => "Sapere, essere al corrente / Comunicare, parlare",
                4 => "Status, sentirti nel giusto ruolo / Nutrimento anche affettivo",
                5 => "Divertimento / Libertà",
                6 => "Avere il controllo / Non sentirsi sovraccaricati",
                7 => "Essere capiti nel proprio dolore / Salvare gli altri dal dolore",
                8 => "Essere importante / Prevedere i problemi",
                9 => "Essere accettati / Far accettare gli altri o situazioni",
            ],
            "PUNTO_DEBOLE" => [
                1 => "Quando le cose non procedono velocemente / Quando non ti senti desiderato",
                2 => "Superficialità / Paura dell’abbandono",
                3 => "Ricerca dell’esperienza / Diffidenza",
                4 => "Insicurezza (non si mostra) / Insicurezza (vuole essere vista)",
                5 => "Incostanza / Non sa difendersi",
                6 => "Tradimento, irresponsabilità / Paura del tradimento",
                7 => "Manipolazione (cerca di essere aiutato) / Non vuole mostrare il dolore",
                8 => "Paura di soffrire (cinismo) / Paura di soffrire (educazione)",
                9 => "Paura di fare male (scoppiare) / Implosione (di non farcela)",
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

        // Determinare quale mappatura usare
        $mappature =
            strpos($slug_mappa, "studio") !== false
                ? $mappature_studio
                : (strpos($slug_mappa, "amore_donna") !== false
                    ? $mappature_amore_donna
                    : (strpos($slug_mappa, "amore_uomo") !== false
                        ? $mappatura_amore_uomo
                        : (strpos($slug_mappa, "bambino_missione_talenti") !==
                        false
                            ? $mappa_bambino_missione_talenti
                            : (strpos($slug_mappa, "lavoro") !== false
                                ? $mappatura_lavoro
                                : $mappature_base))));
        // Inizializzazione array risultati
        $valori = [];

        foreach ($mappature as $chiave => $valori_mappa) {
            if (isset($solution[$chiave])) {
                $indice = $solution[$chiave];
            } else {
                // Se $solution non contiene il valore, prendi il primo valore della categoria
                $indice = array_key_first($valori_mappa);
            }

            $valori[$chiave] =
                $valori_mappa[$indice] ?? "Valore non disponibile";
        }

        return $valori;
    }

    public function handle_map_registration()
    {
        session_start();
        // Verifica se il form è stato inviato tramite POST e il campo 'book' è settato
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book"])) {
            // Previene il doppio invio controllando una variabile di sessione
            if (
                isset($_SESSION["last_submit"]) &&
                time() - $_SESSION["last_submit"] < 30
            ) {
                // echo "<p>Stai inviando troppo rapidamente. Attendere un momento.</p>" ;
                return;
            }
            $_SESSION["last_submit"] = time(); // Prepara i dati dal form $nome=sanitize_text_field($_POST["nome"]);
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
            ); // Formatta il titolo del nuovo post
            $post_title = "Mappa Talenti: " . $nome . " " . $cognome;
            $karma = "";
            $famiglia = "";
            $ego = "prov";
            $BISOGNO = "";
            $puntodebole = "";
            $materna = "";
            $MAESTRO = "";
            $SOCIETA = "";
            $RICONOSCIMENTO = "";
            $PUNTODIFORZA = "";
            $PATERNA = "";
            $MISSIONE = "";
            $CUORE = ""; // Formatta il titolo del nuovo post $post_title="Mappa Talenti: " . $nome . " " .
            $cognome; // Inizializza tutte le variabili per evitare errori $karma="" ; $famiglia="" ; $ego="" ; $bisogno="" ;
            $puntodebole = "";
            $materna = "";
            $maestro = "";
            $societa = "";
            $riconoscimento = "";
            $puntodiforza = "";
            $paterna = "";
            $missione = "";
            $cuore = ""; // Recupera i valori dalla funzione assegnare_valori() $valori=$this->
            assegnare_valori($solution, $slug_mappa);
            //var_dump($valori);
            // Ora puoi usare i valori ottenuti, gestendo eventuali chiavi mancanti
            $karma = $valori["KARMA"] ?? "";
            $famiglia = $valori["FAMIGLIA"] ?? "";
            $ego = $valori["EGO"] ?? "";
            $bisogno = $valori["BISOGNO"] ?? "";
            $puntodebole = $valori["PUNTODEBOLE"] ?? "";
            $materna = $valori["MATERNA"] ?? "";
            $maestro = $valori["MAESTRO"] ?? "";
            $societa = $valori["SOCIETA"] ?? "";
            $riconoscimento = $valori["RICONOSCIMENTO"] ?? "";
            $puntodiforza = $valori["PUNTODIFORZA"] ?? "";
            $paterna = $valori["PATERNA"] ?? "";
            $missione = $valori["MISSIONE"] ?? "";
            $cuore = $valori["CUORE"] ?? "";

            // Creazione del post di tipo "mappa"
            $post_data = [
                "post_title" => $post_title,
                "post_type" => "mappa",
                "post_status" => "publish",
                "post_author" => get_current_user_id(),
                "post_content" => $karma, // Puoi salvare il primo contenuto nel post_content
            ];

            // echo "Section add !";

            $post_id = wp_insert_post($post_data);

            // Se il post viene creato con successo, aggiorna i metadati
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

                //se c'è un oggetto impostato usiamo quello
                $subject_user = get_field("oggetto_email", "option")
                    ? get_field("oggetto_email", "option")
                    : "Riepilogo Mappa Talenti";

                // Costruisci il messaggio HTML dell'email
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

                // Aggiungi header per l'email HTML
                $headers = ["Content-Type: text/html; charset=UTF-8"];

                // Invia l'email
                wp_mail($email, $subject_user, $message_user, $headers);

                // Inviare email di riepilogo all'amministratore
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
                wp_redirect("/grazie-per-lacquisto");
                exit(); // Assicurati che il redirect avvenga subito
            } else {
                // Gestisci l'errore nella creazione del post
                // echo "<p>Errore nella creazione della mappa dei talenti.</p>";
            }
        }
    }
}