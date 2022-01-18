<?php

class Course {
    private $Error;
	private $Result;

    public function createCourse($dataCourse) {
		if(empty($dataCourse["curso_titulo"])) {
				$this->Error = "O curso precisa de um nome!";
				$this->Result = false;
			} elseif (empty($dataCourse["curso_descricao"])) {
				$this->Error = "O curso precisa de uma descrição!";
				$this->Result = false;	
			} elseif (empty($dataCourse["curso_categoria"])) {
				$this->Error = "Por favor, selecione uma categoria para o curso!";
				$this->Result = false;
			}  else {
				$dataCourse['curso_create_date'] = date('Y-m-d H:i:s'); // dia que o curso foi cadastrado
				// $dataCourse['user_level'] = '1';
				$Create = new Create();
				$Create->ExeCreate("cursos", $dataCourse); // cadastrando usuário no banco de dados
				if($Create->getResult()) { // resutado
					$this->Result = $Create->getResult();
					$this->Error =  "O curso foi cadastrado com sucesso!";
				} else {
					$this->Result = false;
					$this->Error = $Create->getError();
				}
			}	
		}


        public function createModule($dataModule) {
			if(empty($dataModule["modulo_name"])) {
					$this->Error = "O módulo precisa de um nome!";
					$this->Result = false;
				} elseif (empty($dataModule["modulo_descricao"])) {
					$this->Error = "O módulo precisa de uma descrição!";
					$this->Result = false;	
				}  else {
					$dataModule['modulo_create_date'] = date('Y-m-d H:i:s'); // dia que o módulo foi criado
					// $dataCourse['user_level'] = '1';
					$Create = new Create();
					$Create->ExeCreate("modulos", $dataModule); // cadastrando módulo no banco de dados
					if($Create->getResult()) { // resutado
						$this->Result = $Create->getResult();
						$this->Error =  "O módulo foi cadastrado com sucesso!";
					} else {
						$this->Result = false;
						$this->Error = $Create->getError();
					}
			}	
		}


        public function getResult() {
            return $this->Result;
        }

        public function getError() {
            return $this->Error;
        }

}