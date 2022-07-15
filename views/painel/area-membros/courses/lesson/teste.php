<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Accordion com CSS3</title>
	<link rel="stylesheet" href="<?= BASE ?>/public/css/accordion.css">
</head>
<body>	
	<div class="accordions"> 
          <div class="accordion-item">
              <input type="radio" name="accordion" checked="checked" id="accordion-1" />
              <label for= "accordion-1">Empresa</label>
              <div class="accordion-content">Minha Empresa</div>
          </div> 
          <div class="accordion-item">
              <input type="radio" name="accordion" id="accordion-2" />
              <label for= "accordion-2">Serviços</label>
              <div class="accordion-content">Meus Serviços</div>
          </div> 
          <div class="accordion-item">
              <input type="radio" name="accordion" id="accordion-3" />
              <label for= "accordion-3">Contatos</label>
              <div class="accordion-content">Meus Contatos</div>
          </div>
      </div>	
</body>
</html>