namespace ControleDeEstabelecimentos.Modelos
{
    public class Usuario
    {

        protected string Nome { get; set; }
        private string Email { get; set; }
        public string NumeroFila { get; set; }
        protected int Telefone { get; set; }


        // Metodos
        protected void EntrarFila(int IdFila, string NumeroFila)
        {
            this.NumeroFila = NumeroFila;
        }
        protected string SairFila(int IdFila)
        {
            return this.NumeroFila;
        }
        protected int AvaliarFila(int IdFila)
        {
            int NotaFila = 5;
            return NotaFila;
        }

    }
}
