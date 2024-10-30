  function LimparInss()
  {
   document.frmInss.periodo.value = ""
   document.frmInss.juros.value = ""
   document.frmInss.parcela.value = ""
   document.forfrmInssm1.montante.value = ""
  }



  function CalcularInss()
  {
     
      var currentTime = new Date();
      var tempoCont = parseInt(document.frmInss.tempo.value);
      var fator = parseInt(document.frmInss.genero.value);
      var idade = parseInt(document.frmInss.idade.value);
      var anoAtual = parseInt(currentTime.getFullYear());
      
      var valorFinal = ((fator-(idade+tempoCont))/2)+anoAtual;
      document.frmInss.aposentar.value = valorFinal;
  
  
}

