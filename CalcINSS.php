<?php

/**
 * @since             1.0.1
 * @package           CalcINSS
 *
 * @wordpress-plugin
 * Plugin Name:       CalcINSS
 * Description:       Este plugin faz o cálculo do ano de aposentadoria seguindo a regra 85/95, que calcula o tempo de contribuição e idade para descobrir o ano de aposentadoria integral pelo INSS.
 * Version:           1.0.1
 * Author:            Aposentadoria - www.aposentadorias.com.br
 * Author URI:        http://www.aposentadorias.com.br/
 * License:           GPL-2.0+
 * Text Domain:       CalcINSS
 */

//
//Utilizar o Shortcode
//		[CalcINSS]
//
//Em todas as páginas ou posts que deseja que apareça, o formulário de cálculos
//
//
function CalcINSS ( $atts ){

	wp_register_style( 'CalcINSS', plugins_url( 'css/CalcInss.css', __FILE__ ) );
	wp_enqueue_style( 'CalcINSS' );

	wp_register_script( 'CalcINSS', plugins_url( 'js/clac.Inss.js', __FILE__ ) );
	wp_enqueue_script( 'CalcINSS' );
	
	wp_register_script( 'maskMoney', plugins_url( 'js/jquery.maskMoney.js', __FILE__ ) );
	wp_enqueue_script( 'maskMoney' );
    
  

	$html = "

            <form name='frmInss' id='frmInss' action='' method='' accept-charset='utf-8'>

	        <table cellspacing='0' cellpadding='3' class='table'>

	          <tbody>
	          		<tr>
	                    <td colspan='2' class='text-center alert alert-info'>Calculadora aposentadoria</td>
	               </tr>

	               <tr>
	                    <td class='text-right col-md-6'>Tempo de contribuição</td>
	                    <td class='col-md-6'><input type='text' value='' class='form-control' maxlength='10' name='tempo' id='tempo'></td>
	               </tr>

	               <tr>
	                    <td class='text-right col-md-6'>Idade</td>
	                    <td class='input-group border'><input type='text' value='' class='form-control'  name='idade' id='idade'>
                        </td>
	               </tr>

	               <tr>
	                    <td class='text-right col-md-6'>Sexo<br>
	                   </td>
                        <td class='col-md-6'>
                            <div class='radio'>
                                <label><input type='radio' name='genero' value='100' class='form-control'>Homem</label></div>
                            <div class='radio'>    
                                <label><input type='radio' name='genero' value='90' class='form-control'>Mulher</label></div>
                        </td>
  
	                   </tr>
                   	<tr>
	                    <td class='text-right col-md-6'>Ano da aposentadoria</td>
	                    <td class='input-group border'><input type='label' value='' readonly class='form-control'  name='aposentar' id='aposentar'> </td>
	               </tr>

	               <tr>
	                    <td colspan='2' class='text-center'>
	                        <button type='button' onclick='CalcularInss()' onkeypress='CalcularInss()' value='CalcularInss' class='btn btn-primary'>Calcular</button>
	                        <button  onclick='Limpar()' onkeypress='LimparInss()' tabindex='6' type='button' class='btn btn-default'>Limpar</button>
	                    </td>
	               </tr>
	          </tbody>
		 </table>
		 <br/>
		 <span>Desenvolvido por <a href='http://www.aposentadorias.com.br' target='_blank'>Aposentadoria</a></span>


	 </form>
     
        <script>


            jQuery(function($){

                $('#montante').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: true});
                $('#parcela').maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: true});
                $('#juros').maskMoney();

            });


        </script>
     
     ";
     
	return $html;

}
add_shortcode('CalcINSS','CalcINSS');
add_action( 'wp_enqueue_style', 'CalcINSS' );
add_action( 'wp_enqueue_script', 'CalcINSS' );
add_action( 'wp_enqueue_script', 'maskMoney' );
?>
