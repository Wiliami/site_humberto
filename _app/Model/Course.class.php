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
			if($Create->getResult()) {
				$this->Result = $Create->getResult();
				$this->Error = "A matrícula foi feita com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}
	}

	public function matriculateLesson($matriculateLesson) {
		if(empty($matriculateLesson['aula_name'])) {
			$this->Error = 'Selecione uma aula!';
			$this->Result = false;
		} elseif(empty($matriculateLesson['user_name'])) {
			$this->Error = 'Selecione um usuário!';
			$this->Result = false;
		} else {
			$Create = new Create();
			$Create->ExeCreate('matriculas_aulas',$matriculateLesson);
			if($Create->getResult()) {
				$this->Error = $Create->getResult();
				$this->Result = 'A matrícula foi realizada com sucesso!';
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}
	}

	
	public function createCategoryCourse($createCategory) {
		if(empty($createCategory['categoria_name'])) {
			$this->Error = "Campo obrigatório!";
			$this->Result = false;
		} else {
			$createCategory['categoria_user_create'] = $_SESSION['login']['user_name'];
			$createCategory['categoria_create_date'] = date('Y-m-d H:i:s');
			$Create = new Create();
			$Create->ExeCreate('categoria_cursos', $createCategory);
				if($Create->getResult()) {
					$this->Result = $Create->getResult();
					$this->Error = 'A categoria foi cadastrada com sucesso!';
				} else {
					$this->Result = false;
					$this->Error = $Create->getError(); 
				}
		}
	}

	public function updateCategoryCourse($updateCategory, $categoriaId) {
		if(empty($updateCategory['categoria_name'])) {
			$this->Error = "Campo obrigatório!";
			$this->Result = false;
		} else {
			$updateCategory['categoria_user_update'] = $_SESSION['login']['user_name'];
			$Update = new Update();
			$Update->ExeUpdate("categoria_cursos", $updateCategory, "WHERE categoria_id = :ci", "ci={$categoriaId}");
			if($Update->getResult()) {
				$this->Result = $Update->getResult();
				$this->Error = 'Categoria atualizada com sucesso!';
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
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

	public function updateCourse($updateCourse, $courseId) {
		if(empty($updateCourse['curso_titulo'])) {
			//PReecn
			$this->Result = false;
			$this->Error = "Preencha o título do curso!";
		} elseif(empty($updateCourse['curso_descricao'])) {
			//Peicnd
			$this->Result = false;
			$this->Error = "Preencha a descrição do curso!";
		}  elseif(empty($updateCourse['curso_valor'])) {
			// Preenca
			$this->Result = false;
			$this->Error = "Preencha o valor do curso!";
		} else {
			$updateCourse['curso_user_update'] = $_SESSION['login']['user_name'];
			$Update = new Update();
			$Update->ExeUpdate("cursos", $updateCourse, "WHERE curso_id = :ci", "ci={$courseId}");
			if($Update->getResult()) {
				$this->Result = $Update->getResult();
				$this->Error = "O curso foi atualizado com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
			}
		}	
	}

	public function deleteCourse($courseId) {
		$Delete = new Delete();
		$Delete->ExeDelete("cursos", "WHERE curso_id = :ci", "ci={$courseId}");
		if($Delete->getResult()) {
			$this->Result = $Delete->getError();
			$this->Error = "O curso foi excluído com sucesso!";
		} else {
			$this->Result= false;
			$this->Error = $Delete->getError();
		}
	}

	

	// ******* MÓDULOS *********
	public function createModule($dataModule) {
		if(empty($dataModule["modulo_name"])) {
				$this->Error = "O módulo precisa de um nome!";
				$this->Result = false;
			} elseif (empty($dataModule["modulo_ordem"])) {
				$this->Error = "O módulo precisa de uma sequência ordinal!";
				$this->Result = false;
			} else {
				$dataModule['modulo_create_date'] = date('Y-m-d H:i:s');
				$dataModule['modulo_user_create'] = $_SESSION['login']['user_name'];
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

	public function updateModule($updateModule, $moduleId) {
		if(empty($updateModule['modulo_name'])) {
			$this->Error = 'Preencha o campo do nome do módulo!';
			$this->Result = false; 
		} elseif(empty($updateModule['modulo_ordem'])) {
			$this->Error = 'Preencha o campo de ordem de módulo!';
			$this->Result = false;
		} else {
			$updateModule['modulo_user_update'] = $_SESSION['login']['user_name'];
			$Update = new Update();
			$Update->ExeUpdate("modulos", $updateModule, "WHERE modulo_id = :mi", "mi={$moduleId}");
			if($Update->getResult()) {
				$this->Result = $Update->getResult();
				$this->Error = 'Módulo atualizado com sucesso!';
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
			}
		}
	}

	public function deleteModule($moduleId) {
		$Delete = new Delete();
		$Delete->ExeDelete("modulos", "WHERE modulo_id = :mi", "mi={$moduleId}");
		if($Delete->getResult()) {
			$this->Result = $Delete->getError();
			$this->Error = "Módulo excluído com sucesso!";
		} else {
			$this->Result = false;
			$this->Error = $Delete->getError();
		}	
	}


	// ******** AULAS ************
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

	public function updateLesson($updateLesson, $lessonId) {
		if(!empty($updateLesson['aula_name'])) {
			$updateLesson['aula_name'] = $updateLesson['aula_name'];
		} elseif(!empty($updateLesson['aula_duracao'])) {
			$updateLesson['aula_duracao'] = $updateLesson['aula_duracao'];
		} elseif(!empty($updateLesson['aula_url'])) {
			$updateLesson['aula_url'] = $updateLesson['aula_url'];
		} else {
			$Update = new Update();
			$Update->ExeUpdate("aulas", $updateLesson, "WHERE aula_id = :ai", "ai={$lessonId}");
			if($Update->getResult()) {
				$this->Result = $updateLesson->getResult(); 
				$this->Error = "A aula foi atualizada com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $updateLesson->getError();
			}
		}
	}

	public function deleteLesson($courseId) {
		$Delete = new Delete();
		$Delete->ExeDelete('aulas', "WHERE aula_id = :ai", "ai={$courseId}");
		if($Delete->getResult()) {
			$this->Result = $Delete->getError();
			$this->Error = 'A aula foi excluída com sucesso!';
		} else {
			$this->Result = false;
			$this->Erro = $Delete->getError();
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