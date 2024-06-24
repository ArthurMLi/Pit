namespace ControleDeEstabelecimentos.Modelos
{
    public class Fila
    {
        // Atributos
        public int NumeroPessoas;
        public string EstabelecimentoFila;
        public DateTime TempoMedio;
        public string PessoasFila;
        private Usuario Usuario = new Usuario();

        // Metodos
        public void EntrarFila(int IdFila, string NumeroFila)
        {
            this.Usuario.numerofila = NumeroFila;
        }
        public string SairFila(int IdFila)
        {
            return this.Usuario.numerofila;
        }
        public int AvaliarFila(int IdFila)
        {
            int NotaFila = 5;
            return NotaFila;
        }
        private int CalcularMedia()
        {
            return 0;
        }

    }
}
