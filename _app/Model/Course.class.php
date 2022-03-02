<?php
class Course {
    private $Error;
	private $Result;

	public function matriculateCourse($matriculate) {
		if(empty($matriculate['curso_titulo'])) {
			$this->Error = "Selecione um curso!";
			$this->Result = false;
		} elseif(empty($matriculate['user_name'])) {
			$this->Error = "Selecione um usuário!";
			$this->Result = false;
		} else {
			$matriculate['matricula_create_date'] = date('Y-m-d H:i:s');
			$Create = new Create();
			$Create->ExeCreate('matriculas', $matriculate);
			if($Read->getResult()) {
				$this->Result = $Create->getResult();
				$this->Error = "A matrícula foi feita com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}
	}
	
	public function createCategoryCourse($category) {
		if(empty($category['categoria_name'])) {
			$this->Error = "Campo obrigatório!";
			$this->Result = false;
		} else {
			$category['categoria_create_date'] = date('Y-m-d H:i:s');
			$Create = new Create();
			$Create->ExeCreate('categoria_cursos', $category);
				if($Create->getResult()) {
					$this->Result = $Create->getResult();
					$this->Error = 'A categoria foi cadastrada com sucesso!';
				} else {
					$this->Result = false;
					$this->Error = $Create->getError(); 
				}
		}
	}

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
				$dataCourse["curso_create_date"] = date('Y-m-d H:i:s');
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
		if(empty($updateCourse['curso_titulo'])) {
			$this->Error = 'É necessário atualizar ao menos um campo para finalizar atualização!';
			$this->Result = false;
		} else {
			$Update = new Update();
			$Update->ExeUpdate("cursos", $updateCourse, "WHERE curso_id = :ci", "ci={$updateCourse}");
			if ($Update->getResult()) {
				$this->Result = $Update->getResult();
				$this->Error = "O curso foi atualizado com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
			}
		}
	}
	

	public function deleteCourse($deleteCourse) {
		if(empty($deleteCourse['curso_titulo'])) {
			$this->Error = 'É necessário selecionar um curso para finalizar exclusão!';
			$this->Result = false;
		} else {
			$Delete = new Delete();
			$Delete->ExeDelete("DELETE cursos WHERE curso_id = :ci", "ci={$deleteCourse}");
			if($Delete->getResult()) {
				$this->Result = $Delete->getError();
				$this->Error = "O curso foi excluído com sucesso!";
			} else {
				$this->Result= false;
				$this->Error = $Delete->getError();
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
				} else {
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
			if(empty($dataLesson['curso_titulo'])) {
				$this->Error = "Selecione um curso para cadastrar a aula!";
				$this->Result = false;
			} elseif(empty($dataLesson['modulo_name'])) {
				$this->Error = "Selecione um módulo para cadastrar a aula";
				$this->Result = false;
			} elseif(empty($dataLesson['aula_name'])) {
				$this->Error = "A aula precisa de um nome!";
				$this->Result = false;
			} elseif(empty($dataLesson['aula_duracao'])) {
				$this->Error = "Ops! Qual é a duração da aula?";
				$this->Result = false;
			} elseif(empty($dataLesson['aula_url'])) {
				$this->Error = "A aula precisa de uma url!";
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

		public function updateLesson($updateLesson) {
			if(empty($updateLesson['aula_name'])) {
				$this->Error = "É necesário atualizar ao menos um campo para concluir atualização da aula!";
				$this->Result = false;
			} else {
				$Update = new Update();
				$Update->ExeUpdate("aulas", $updateLesson, "WHERE aula_id = :ai", "ai={$updateLesson}");
				if($Update->getResult()) {
					$this->Result = $updateLesson->getResult(); 
					$this->Error = "A aula foi atualizada com sucesso!";
				} else {
					$this->Result = false;
					$this->Error = $updateLesson->getError();
				}
			}
		}

		public function deleteLesson() {
			if(empty(['aula_id'])) {
				$this->Error = 'Selecione uma aula para excluir!';
				$this->Result = false;
			} else {
				$Delete = new Delete();
				$Delete->exeDelete('aulas', "WHERE aula_id = :ai", "ai={aula_id}");
				if($Delete->getResult()) {
					$this->Result = $$Delete->getError();
					$this->Error = 'A aula foi deletada com sucesso!';
				} else {
					$this->Result = false;
					$this->Error->$Delete->getError();
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