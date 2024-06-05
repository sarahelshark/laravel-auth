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

step 1
- creare la migration per la tabella types <----F A T T O
- creare il model Type <----F A T T O

step 2
- creare la migration di modifica per la tabella projects per aggiungere la chiave esterna  <----F A T T O
- aggiungere ai model Type e Project i metodi per definire la relazione one to many <----F A T T O

step 3
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente <----F A T T O
- permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un  progetto  <----F A T T O
- gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione  <----F A T T O

Bonus 1: creare il seeder per il model Type.  <----F A T T O

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



L’esercizio di oggi è suddiviso in milestone ed è importante che ne seguiate l’ordine.
Milestone 1
Aggiungiamo al nostro progetto Laravel una nuovo Api/ProjectController. <---- ok
Questo controller risponderà a delle richieste via API e si occuperà di restituire la lista dei progetti presenti nel database in formato json.   <---- ok

Milestone 2
Testiamo la chiamata API tramite Postman e assicuriamoci di ricevere i dati correttamente  <---- ok

### API.PHP 
diff con web.php? 
- andiamo a restituire dati in formato json nelle nostre rotte (poi uso fetch di js o axios x consumare le api)
>> return NON view ma FILE JSON dentro la fine del notro metodo nel Controller 

ritornare una "closure" 
return response() ->json([
    "name"=>"Michele",
    "state"=>'Italy'
]);
l'array viene trasformato in JSON da consegnare ad utente tramite chiamata API
>> return NON SOLO file JSON, ma potrei anche ritornare una COLLECTION 

 return::all() 

1) CREARE UNA CARTELLA AAPI DEDICATA, CONTROLLER
```bash
 php artisan make:controller Api/UserController

```
2) METODO INDEX, restituisce la lista di tutti i post presenti nel nostro db
```php
pulic function index(){
    $posts = Post::all();
    return responde() ->json([
        'success' => true,
        'results' => $posts''
    ]);
    };
    //restituisce tutta la collection
```
!! paginazione
se abbiamo molti records nel db, possiamo mostrarli gradualmente con la paginazione  ->paginate(numero)
posso farlo anche con API 

```php
pulic function index(){
    $posts = Post::paginate(3);
    return response() ->json([
        'success' => true,
        'results' => $posts''
    ]);
    };
    //restituisce una istanza del paginatore con dati e info della paginazione >>> di fatto, la paginazione modifica il modo in cui sono strutturati i dati chericeviamo 
    this.posts= response.data.results.data;   (results chiave=>valore) in data trovo la lista post 
    this.currentPage= response.data.results.current_page;
    this.lastPage = responde.data.results.last_page;
```

3) NAVIGARE TRA PAGINE, con chiamata ajax, attraverso il parametro PAGE e richiesta GET
!!! nessuna modifica al controller in quanto cie pensa Laravek automaticamente
 ```php
 axios.get(`${this.baseURL}`/api/posts, {
    params:{
        page:PostApiPage
    }
 })
 //http://127.0.0.1:80000/api/posts?page=2
 ```

 EAGER LOADING=>recuperare in modo ottimizzato i model collegati
 
 se voglio che Eloquent aggiugna ai risultati i vari records che sono inb relazione con il nostro model principale (in questo caso Post), 
 - usare metodo with() 
 - passare come parametri i nomi dei metodi dentro il modello Post o quello che stiamo ottimizzando, tipo category o user

 ```php
 pulic function index(){
    $posts = Post::with('category', 'user')->paginate(3);
    return responde() ->json([
        'success' => true,
        'results' => $posts''
    ]);
    };
 ```

