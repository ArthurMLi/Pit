namespace ControleDeEstabelecimentos.Modelos
{
    public class Estabelecimento
    {
        // Atributos
        public int Id;
        protected string nome;
        private int cnpj;
        protected string descricao;
        private string logo;

        // Props
        public string Nome { get { return this.nome; } set { this.nome = value; }}
        public int Cnpj { get { return this.cnpj; } set { this.cnpj = value; } }
        public string Descricao { get { return this.descricao; } set { this.descricao = value; } }
        public string Logo { get { return this.logo; } set { this.logo = value; } }

    }
}
