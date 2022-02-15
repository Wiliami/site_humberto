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
				$dataCourse['curso_create_date'] = date('Y-m-d H:i:s');
				$Create = new Create();
				$Create->ExeCreate("cursos", $dataCourse); 
				if($Create->getResult()) {
					$this->Result = $Create->getResult();
					$this->Error =  "O curso foi cadastrado com sucesso!";
				} else {
					$this->Result = false;
					$this->Error = $Create->getError();
				}
			}	
		}

	public function updateCourse($updateCourse) {
		return 'ok';
	}

	public function deleteCourse($deleteCourse) {
		return 'ok';
	}


        public function createModule($dataModule) {
			if(empty($dataModule["modulo_name"])) {
					$this->Error = "O módulo precisa de um nome!";
					$this->Result = false;
				} elseif (empty($dataModule["modulo_descricao"])) {
					$this->Error = "O módulo precisa de uma descrição!";
					$this->Result = false;	
				}  else {
					$dataModule['modulo_create_date'] = date('Y-m-d H:i:s');
					$Create = new Create();
					$Create->ExeCreate("modulos", $dataModule);
					if($Create->getResult()) {
						$this->Result = $Create->getResult();
						$this->Error =  "O módulo foi cadastrado com sucesso!";
					} else {
						$this->Result = false;
						$this->Error = $Create->getError();
					}
			}	
		}


		public function createLesson($dataLesson) {
			if(empty($dataLesson['aula_name'])) {
				$this->Error = "A aula precisa de um nome!";
				$this->Result = false;
			// } elseif(empty($dataLesson['modulo_name'])) {
			// 	$this->Error = "O módulo precisa de um nome!";
			// 	$this->Result = false; 
			// } elseif(empty($dataLesson['aula_name'])) {
			// 	$this->Error = "A aula precisa de um nome!";
			// 	$this->Result = false;
			} elseif(empty($dataLesson['aula_duracao'])) {
				$this->Error = "A aula precisa de um tempo de duração!";
				$this->Result = false;
			} else {
				$dataLesson['aula_create_date'] = date('Y-m-d H:i:s');
				$Create = new Create();
				$Create->exeCreate("aulas", $dataLesson); // eu estou enviando a criação de aulas para a tabela de aulas.
				if($Create->getResult()) {
					$this->Result = $Create->getResult();
					$this->Error = "A aula foi cadastrada com sucesso!";
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
?>