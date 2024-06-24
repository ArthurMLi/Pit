namespace ControleDeEstabelecimentos.Modelos
{
    public class Funcionario
    {
        
        // Atributos
        protected int id;
        protected string nome;
        private string email;
        protected int telefone;

        //Props
        public int Id { get { return id; }  set { id = value; } }
        public string Nome { get { return nome; } set { nome = value; } }
        public string Email { get { return email; } set { email = value; } }
        public int Telefone { get { return telefone; } set { telefone = value; } }

        // Metodos
        public void AbrirFila(int Id)
        {

        }
        public void FecharFila(int Id)
        {

        }
        public string ChamarProximo(int Id, string NumeroFila)
        {
            string ProximoNumero = NumeroFila;
            return ProximoNumero;
        }


    }
}
