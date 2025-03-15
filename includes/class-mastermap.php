<?php

/**
 * classe principale starter plugin
 **/
namespace map_plugin;

class Mastermap
{
    const VERSIONE = "1.0";

    function __construct()
    {
        add_action("init", [$this, "handle_map_registration"]); //aggiungo registrazione
    }
    //lo chiamo nello shortcode in functions
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
                echo "<p>Stai inviando troppo rapidamente. Attendere un momento.</p>";
                return;
            }
            $_SESSION["last_submit"] = time();

            // Prepara i dati dal form
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

            // Formatta il titolo del nuovo post
            $post_title = "Mappa Talenti: " . $nome . " " . $cognome;
            $testo = "";
            $fuoco = "";
            $first = "prova";
            $second = "";
            $third = "";
            $four = "";
            $five = "";
            $albero = "";
            $acqua = "";
            $specchio = "";
            $fulmine = "";
            // Formattazione migliorata con Heredoc e spaziatura adeguata
            if (strpos($slug_mappa, "amore") !== false) {
                $first = "Fuoco: bisogno compulsivo del sesso/rifiuto del sesso.
Il sesso è una delle forme d’espressione con la quale trasformiamo la rabbia. Dovrebbe essere un mezzo con il quale entriamo in comunicazione profonda con l’altro, ma in questo caso la difficoltà è proprio questa. Sia chi cerca compulsivamente il sesso, che chi lo rifiuta ha la difficoltà ad entrare in comunicazione profonda con l’altro in quanto in profondità c’è la rabbia.
";
                $second = " Il karma in amore è la prima sfida a gestire le tue emozioni che incontrerai nella vita. È chiaramente legato alla famiglia, ma anche alla società (immagina di nascere in un contesto di guerra). La prima parte della vita avrai quindi la tendenza a incontrare, nei tuoi sentimenti, questa sfida nei partner che incontri. Questo fino a che non sarai riuscito a trasformarlo. Poi passerai al Dharma, ovvero la parte costruttiva dell’esperienza, che avrà le caratteristiche descritte dalla missione.
Trasformazione: contattare la rabbia e iniziare a “sentire” veramente l’altro.
Per aiutarti puoi usare il codice vibrazionale: “Papa” o “Mama”.";
            } elseif (strpos($slug_mappa, "bambini") !== false) {
                $fuoco = "
- Sfida: Trasformare la rabbia in passione.
- Talento: La capacità di entusiasmare gli altri.
";

                $second = "
- Sfida: Assumersi responsabilità senza perdere l'innocenza.
- Talento: Saggezza innata.
";
                $third = " 
- Sfida: Trasformare l'ansia in opportunità.
- Talento: Grande intuizione.";

                $four = "
- Sfida: Trasformare l'insicurezza in fierezza.
- Talento: Molteplici capacità da sviluppare.";

                $five = "
- Sfida: Trasformare la superficialità in gioia.
- Talento: Grande creatività.";

                $albero = "
- Sfida: Trasformare il bisogno di controllo in stabilità.
- Talento: Amore per la propria comunità.";

                $acqua = "
- Sfida: Trasformare l'ipersensibilità in empatia.
- Talento: Capacità di ascolto profondo.
";

                $specchio = "
- Sfida: Gestire problemi di apprendimento o difficoltà ad adattarsi al ritmo degli altri.
- Talento: Intelligenza altra o intelligenza superiore alla media.";

                $fulmine = "
- Sfida: Trasformare il bisogno di gruppo in autonomia.
- Talento: Capacità di aiuto e collaborazione.";
            } elseif (strpos($slug_mappa, "lavoro") !== false) {
                $fuoco = "
- Tendenza a bruciare troppo velocemente le energie e le risorse.
- Impulsività che porta a decisioni affrettate e poco ponderate.
- Dominanza eccessiva che può intimidire colleghi e collaboratori.
";
                $second = "
- Eccessivo distacco emotivo che compromette le relazioni lavorative.
- Rigidità mentale che ostacola il cambiamento.";

                $third = "
- Dispersione delle energie in troppi progetti simultanei.
- Difficoltà nel portare a termine gli impegni presi.";

                $four = "
- Perfezionismo paralizzante che rallenta i processi.
- Attaccamento ossessivo ai dettagli perdendo la visione d'insieme.";
            } else {
                $first = "Karma del Fuoco: lo studente si confronta con la paura di brillare e mostrarsi. La sfida è imparare a gestire la propria energia senza spegnerla.
";
                $second =
                    "la sfida principale è superare il perfezionismo paralizzante. Tende a procrastinare per paura di non essere perfetto.";
                $third =
                    "la sfida principale è superare la tendenza a disperdere le energie in troppe direzioni. Tende a non portare a termine i progetti iniziati.";
                $four = " insicurezza sulle proprie capacità, si sminuisce nonostante le evidenti competenze.
.";

                $five =
                    "prende lo studio troppo alla leggera, deve imparare l’equilibrio tra leggerezza e impegno.";
            }
            // Se le variabili sono vuote o hanno meno di 10 caratteri, assegna i valori predefiniti
            if (empty($first) || strlen($first) < 10) {
                $first =
                    "Karma del Fuoco: lo studente si confronta con la paura di brillare e mostrarsi. La sfida è imparare a gestire la propria energia senza spegnerla.";
            }
            if (empty($second) || strlen($second) < 10) {
                $second =
                    "La sfida principale è superare il perfezionismo paralizzante. Tende a procrastinare per paura di non essere perfetto.";
            }
            if (empty($third) || strlen($third) < 10) {
                $third =
                    "La sfida principale è superare la tendenza a disperdere le energie in troppe direzioni. Tende a non portare a termine i progetti iniziati.";
            }
            if (empty($four) || strlen($four) < 10) {
                $four =
                    "Insicurezza sulle proprie capacità, si sminuisce nonostante le evidenti competenze.";
            }
            if (empty($five) || strlen($five) < 10) {
                $five =
                    "Prende lo studio troppo alla leggera, deve imparare l’equilibrio tra leggerezza e impegno.";
            }

            $post_data = [
                "post_title" => $post_title,
                "post_type" => "mappa",
                "post_status" => "publish",
                "post_author" => get_current_user_id(),
                "post_content" => $first, // Puoi salvare il primo contenuto nel post_content
            ];

            $post_id = wp_insert_post($post_data);

            if ($post_id != 0) {
                update_post_meta($post_id, "section1", $first);
                update_post_meta($post_id, "section2", $second);
                update_post_meta($post_id, "section3", $third);
                update_post_meta($post_id, "section4", $four);
                update_post_meta($post_id, "section5", $five);
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
$message_user = '
<!doctype html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>' . $subject_user . '</title>
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
                <img src="https://ninenergymap.com/wp-content/uploads/2025/02/logo_ninenergy_header.png" alt="Ninenergy Logo">
            </div>
            
            <!-- Corpo Email -->
            ' . ($corpo_email ? $corpo_email : "<h1 style='font-size:18px'>Grazie per aver compilato la Mappa Talenti</h1>") . '
            ' . $solution_content . '
            
            <!-- Download -->
            <div class="download-box">
                <p><b>' . $label_download . '</b></p>
                <p><span class="dwnButton">' . $download_link . '</span></p>
            </div>
        </div>

        <!-- Footer -->
        ' . ($footer_email ? '<div class="footer"><p>' . $footer_email . '</p></div>' : '') . '
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
                echo "<p>Errore nella creazione della mappa dei talenti.</p>";
            }
        }
    }
}