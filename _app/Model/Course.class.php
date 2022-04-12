<?php

class Course {

    private $Error;
	private $Result;

	private function verfiyDuplicateUserCourse($courseId, $userId) {
		$Read = new Read();
		$Read->FullRead("SELECT user_id FROM matriculas_cursos WHERE curso_id = :ci AND user_id = :ui", "ci={$courseId}&ui={$userId}");
		if($Read->getResult()) {
			$this->Error = "Esse curso já foi cadastrado. Selecione outro curso!";
			return true;
		} else {
			return false;
		}
	}

	
	public function matriculateCreateCourse($matriculateUser) {
		if(empty($matriculateUser['curso_id'])) {
			$this->Error = "Selecione um curso!";
			$this->Result = false;
		} elseif(empty($matriculateUser['user_id'])) {
			$this->Error = "Selecione um usuário!";
			$this->Result = false;
		} elseif($this->verfiyDuplicateUserCourse($matriculateUser['curso_id'], $matriculateUser['user_id'])) {
			$this->Result = false;
		} else {
			$matriculateUser['matricula_create_date'] = date('Y-m-d H:i:s');
			$matriculateUser['matricula_create_user'] = $_SESSION['login']['user_id'];
			$Create = new Create();
			$Create->ExeCreate('matriculas_cursos', $matriculateUser);
			if($Create->getResult()) {
				$this->Result = $Create->getResult();
				$this->Error = "Matrícula realizada com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}
	}

	public function matriculateUpdateCourse($updateMatriculateCourse, $matriculaId) {
		if(empty($updateMatriculateCourse['curso_id'])) {
			$this->Error = "Atualize o curso!";
			$this->Result = false;
		} else {
			$updateMatriculateCourse['matricula_update_user'] = $_SESSION['login']['user_id'];
			$Update = new Update();
			$Update->ExeUpdate("matriculas_cursos", $updateMatriculateCourse, "WHERE matricula_id = :mi", "mi={$matriculaId}");
			if($Update->getResult()) {
				$this->Result = $Update->getResult();
				$this->Error = "Matrícula foi atualizada com sucesso!"; 
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
			}

		}
	}

	public function deleteMatriculateCourse($matriculaId) {
		$Delete = new Delete();
		$Delete->ExeDelete("matriculas_cursos", "WHERE matricula_id = :mi", "mi={$matriculaId}");
		if($Delete->getResult()) {
			$this->Result = $Delete->getResult();
			$this->Error = "Mátricula foi excluída com sucesso!";
		} else {
			$this->Result = false;
			$this->Error = $Delete->getError();
		}
	}
 
	public function matriculateCreateLesson($matriculateLesson) {
		if(empty($matriculateLesson['aula_id'])) {
			$this->Error = 'Selecione uma aula!';
			$this->Result = false;
		} elseif(empty($matriculateLesson['user_id'])) {
			$this->Error = 'Selecione um usuário!';
			$this->Result = false;
		} else {
			$matriculateLesson['matricula_create_date'] = date('Y-m-d H:i:s');
			$matriculateLesson['matricula_user_create'] = $_SESSION['login']['user_id'];
			$Create = new Create();
			$Create->ExeCreate('matriculas_aulas', $matriculateLesson);
			if($Create->getResult()) {
				$this->Error = $Create->getResult();
				$this->Result = 'A matrícula na aula foi realizada com sucesso!';
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}
	}

	public function updateMatriculateLesson($updateMatriculateLesson, $matriculaId) {
		if(empty($updateMatriculateLesson['aula_id'])) {
			$this->Error = "Atualize a aula!";
			$this->Result = false;
		} elseif(empty($updateMatriculateLesson['user_id'])) {
			$this->Error = "Atualize o nome do usuário!";
			$this->Result = false;
		} else {
			$updateMatriculateLesson['matricula_user_update'] = $_SESSION['login']['user_id'];
			$Update = new Update();
			$Update->ExeUpdate("matriculas_aulas", $updateMatriculateLesson, "WHERE matricula_id = :mi", "mi={$matriculaId}");
			if($Update->getResult()) {
				$this->Result = $Update->getResult();
				$this->Error = "A matrícula foi atualizada com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
			}
		}
	}

	public function deleteMatriculateLesson($matriculaId) {
		$Delete = new Delete();
		$Delete->ExeDelete("matriculas_aulas", "WHERE matricula_id = :mi", "mi={$matriculaId}");
		if($Delete->getResult()) {
			$this->Result = $Delete->getResult();
			$this->Error = "Matrícual foi excluída com sucesso!";
		} else {
			$this->Result = false;
			$this->Error = $Delete->getError();
		}
	}
	
	public function createCategoryCourse($createCategory) {
		if(empty($createCategory['categoria_name'])) {
			$this->Error = "Campo obrigatório!";
			$this->Result = false;
		} else {
			$createCategory['categoria_create_user'] = $_SESSION['login']['user_id'];
			$createCategory['categoria_create_date'] = date('Y-m-d H:i:s');
			$Create = new Create();
			$Create->ExeCreate('categoria_cursos', $createCategory);
				if($Create->getResult()) {
					$this->Result = $Create->getResult();
					$this->Error = 'Categoria cadastrada com sucesso!';
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
			$updateCategory['categoria_user_update'] = $_SESSION['login']['user_id'];
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
				$dataCourse['curso_user_create'] = $_SESSION['login']['user_id'];
				$Create = new Create();
				$Create->ExeCreate("cursos", $dataCourse); 
				if($Create->getResult()) {
					$this->Result = $Create->getResult();
					$this->Error =  "Curso cadastrado com sucesso!";
				} else {
					$this->Result = false;
					$this->Error = $Create->getError();
				}
			}	
		}	

	public function updateCourse($updateCourse, $courseId) {
		if(empty($updateCourse['curso_titulo'])) {
			$this->Result = false;
			$this->Error = "Preencha o título do curso!";
		} elseif(empty($updateCourse['curso_descricao'])) {
			$this->Result = false;
			$this->Error = "Preencha a descrição do curso!";
		}  elseif(empty($updateCourse['curso_valor'])) {
			$this->Result = false;
			$this->Error = "Preencha o valor do curso!";
		} else {
			$updateCourse['curso_user_update'] = $_SESSION['login']['user_id']; 
			$Update = new Update();
			$Update->ExeUpdate("cursos", $updateCourse, "WHERE curso_id = :ci", "ci={$courseId}");
			if($Update->getResult()) {
				$this->Result = $Update->getResult();
				$this->Error = "Curso atualizado com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
			}
		}	
	}

	public function deleteCourse($courseId) {
		if($this->verifyCursoMatricula($courseId)) {
			$this->Result = false;
			$this->Error = "Existem matrículas neste curso!";
		} elseif($this->verifyModuleCourse($courseId)) {
			$this->Result = false;
			$this->Error = "Existem módulos neste curso!";
		} elseif($this->verifyLessonCourse($courseId)) {
			$this->Result = false;
			$this->Error = "Existem aulas neste curso!";
		} else {
			$Delete = new Delete();
			$Delete->ExeDelete("cursos", "WHERE curso_id = :ci", "ci={$courseId}");
			if($Delete->getResult()) {
				$this->Result = $Delete->getError();
				$this->Error = "Curso excluído com sucesso!";
			} else {
				$this->Result= false;
				$this->Error = $Delete->getError();
			}
		}
	}

	public function verifyCursoMatricula($courseId) {
		$Read = new Read();
		$Read->FullRead("SELECT * FROM matriculas_cursos WHERE curso_id = :ci", "ci={$courseId}");
		if($Read->getResult()) {
			return true;
		}
		return false;
	}

	public function verifyModuleCourse($courseId) {
		$Read = new Read();
		$Read->FullRead("SELECT * FROM modulos WHERE curso_id = :ci", "ci={$courseId}");
		if($Read->getResult()) {
			return true;
		}
		return false;
	}

	public function verifyLessonCourse($courseId) {
		$Read = new Read();
		$Read->FullRead("SELECT * FROM aulas WHERE curso_id = :ci", "ci={$courseId}");
		if($Read->getResult()) {
			return true;
		}
		return false;
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
				$dataModule['modulo_create_user'] = $_SESSION['login']['user_id'];
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
			$updateModule['modulo_update_user'] = $_SESSION['login']['user_id'];
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


	// *************** AULAS ***************
	public function createLessonModule($dataLesson) {
		if(empty($dataLesson['aula_name'])) {
			$this->Error = "A aula precisa de um nome!";
			$this->Result = false;
		} elseif(empty($dataLesson['aula_duracao'])) {
			$this->Error = "Qual é a duração da aula?";
			$this->Result = false;
		} elseif(empty($dataLesson['aula_url'])) {
			$this->Error = "A aula precisa de uma url!";
			$this->Result = false;
		} else {
			$dataLesson['aula_create_date'] = date('Y-m-d H:i:s');
			$dataLesson['aula_create_user'] = $_SESSION['login']['user_id'];
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
		if(empty($updateLesson['aula_name'])) {
			$this->Result = false;
			$this->Error = "Preencha o nome da aula!";
		} elseif(empty($updateLesson['aula_duracao'])) {
			$this->Result = false;
			$this->Error = "Preencha a duração da aula!";
		} elseif(empty($updateLesson['aula_url'])) {
			$this->Result = false;
			$this->Error = "Informe a url da aula!";
		} else {
			$updateLesson['aula_create_user'] = $_SESSION['login']['user_id'];
			$Update = new Update();
			$Update->ExeUpdate("aulas", $updateLesson, "WHERE aula_id = :ai", "ai={$lessonId}");
			if($Update->getResult()) {
				$this->Result = $Update->getResult(); 
				$this->Error = "Aula atualizada com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Update->getError();
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

	// ************** MÓDULOS DE CURSOS **************
	public function createModuleCourse($createModuleCourse) {
		if(empty($createModuleCourse['modulo_name'])) {
			$this->Error = "Preencha o campo de nome do módulo!";
			$this->Result = false;
		} else {
			$createModuleCourse['modulo_create_user'] = $_SESSION['login']['user_id'];
			$createModuleCourse['modulo_create_date'] = date('Y-m-d H:i:s');
			$Create = new Create();
			$Create->ExeCreate("modulos", $createModuleCourse);
			if($Create->getResult()) {
				$this->Result = $Create->getResult();
				$this->Error = "Módulo cadastrado com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
 		}
	}

	public function purchaseUserCourse() {
		$this->Error = 'Compra realizada com sucesso!';
		$this->Result = false;
	} 

	public function getResult() {
		return $this->Result;
	}

	public function getError() {
		return $this->Error;
	}
}
