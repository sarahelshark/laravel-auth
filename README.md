Creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Rifate ciò che abbiamo visto insieme stasera stilando tutto a vostro piacere utilizzando bootstrap e css (da scrivere nel file app.scss)

Descrizione:
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel 9 Preset con autenticazione.  <--------------F A T T O

Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
Autenticazione: si parte con l'autenticazione e la creazione di un layout semplice per il back-office <--------------F A T T O

<--------------F A T T O parzialmnente (modifico posts)
Creazione del modello Project con relativa migrazione, seeder, controller e rotte
Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti

<--------------D A    F A R E
Bonus
Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando due form requests.



________________________________________________________________
bs5+ sass
composer require pacificdev/laravel_9_preset
php artisan preset:ui bootstrap --auth

doc
https://packagist.org/packages/pacificdev/laravel_9_preset
It works from laravel 9.x to the latest release 10.x


@csrf cross site request forgery

Ciao @qui, continuiamo a lavorare sul codice dei giorni scorsi, nella stessa repo aggiungiamo una nuova entità Type.
Questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
creare la migration per la tabella types
creare il model Type
creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
aggiungere ai model Type e Project i metodi per definire la relazione one to many
visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione
Bonus 1: creare il seeder per il model Type.
Bonus 2: aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
Buon lavoro e buon divertimento! Confermate lettura come al solito :baby-yoda: