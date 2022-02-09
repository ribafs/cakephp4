# Customizando a paginação no CakePHP 4

Ajustando para mostrar 10 registros por página
```
class ClientesController extends AppController
{
    public $paginate = [
        'limit' => 10,
        'order' => [
            'Clientes.nome' => 'asc'
        ]
    ];

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
    }
```

