namespace ControleDeEstabelecimentos.Modelos
{
    public class Estabelecimento
    {
        protected int Id { get; set; }
        protected string Nome { get; set; }
        private int Cnpj { get; set; }
        protected string Descricao { get; set; }
        protected string Logo { get; set; }

    }
}
