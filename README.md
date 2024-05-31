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

Nella stessa repo aggiungiamo una nuova entità Type.

Questa entità rappresenta la tipologia di progetto ed è in relazione ONE TO MANY con i progetti.

- creare la migration per la tabella types <----F A T T O
- creare il model Type <----F A T T O
- creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un  progetto
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione
Bonus 1: creare il seeder per il model Type.
Bonus 2: aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.


Nella stessa repo  aggiungiamo una nuova entità Technology.
Questa entità rappresenta le tecnologie utilizzate ed è in relazione MANY TO MANY con i progetti.

- creare la migration per la tabella technologies 
- creare il model Technology
- creare la migration per la tabella pivot project_technology
- aggiungere ai model Technology e Project i metodi per definire la relazione many to many
- visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
- permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione
Bonus 1: creare il seeder per il model Technology.
Bonus 2: aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.


