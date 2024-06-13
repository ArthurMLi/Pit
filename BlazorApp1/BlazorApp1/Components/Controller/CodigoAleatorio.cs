using Microsoft.AspNetCore.Mvc.Filters;
using System;
using System.Timers;

namespace BlazorApp1.Components.Controller
{
	public class CodigoAleatorio
	{

		public string CriarCodigo()
		{
			Random rand = new Random();
			 string Codigo = "";

			char[] Letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

			int cont = 0;
			int QuantidadeDeLetras = 6;//Escolhe a quantidade de letras/numeros q quer tenha no codigo
			while (cont != QuantidadeDeLetras)
			{
				if (rand.Next(0, 2) == 0)
				{
					Codigo += rand.Next(0, 9);
				}
				else
				{
					Codigo += Letras[rand.Next(0, Letras.Length)];
				}
				cont++;
			}
			return Codigo;

		}
		//so testando aqui v
		

		
	}
}
		



