<?php 
class User {
	//métodos da classe:
	// - verifyLevelUserModerator -> verifica se o nível de usuário é diferente do nível moderador
	// - verifyDuplicateUserEmail -> verificar se o usuário digitou o email que já está em uso. 
	// - resetUserPassword -> alterar a senha do usuário
	// - getForgot -> envia o email de recuperação de senha ao usuário
	private $Error;
	private $Result;

	public function createLevelUser($createLevel) {
		if(empty($createLevel['name-level'])) {
			$this->Error = "Campo obrigatório!";
			$this->Result = false; 
		} elseif(empty($createLevel['level'])) {
			$this->Error = "Qual o número desse nível?";
			$this->Result = false;
		}
		$createLevel['level_create_date'] = date('Y-m-d H:i:is');
		$Create = new Create();
		$Creatte->ExeCreate('users_levels', $createLevel);
		if ($Create->getResult()) {
			$this->Result = $Create->getResult();
			$this->Error = "Nível de usuário cadastrado com sucesso!";
		} else {
			$this->Result = false;
			$this->Error = $Create->getError();
		}
	}


	public function verifyLevelUserModerator() {
		if($_SESSION['login']['user_level'] >= 6) { 
			return header('Location: ' . BASE . '/painel/dashboard');
			exit();
		} 
	}
	
	public function searchCourse() {
		if(empty($course['aula_name'])) {
			$this->Error = "Pesquisa alguma coisa!";
			$this->Result = false;
		}
	}

	public function createUser($dataUser) {
	if(empty($dataUser["user_name"])) {
			$this->Error = "Preencha no campo um nome!";
			$this->Result = false;
		} elseif (empty($dataUser["user_email"])) {
			$this->Error = "Preencha o e-mail!";
			$this->Result = false;
		} elseif (empty($dataUser["user_password"])) {
			$this->Error = "Preencha a senha!";
			$this->Result = false;
		} elseif ($this->verifyDuplicateUserEmail($dataUser['user_email'])) {
			$this->Result = false;
		} else {
			$dataUser['user_password'] = md5($dataUser['user_password']);
			$dataUser['user_create_date'] = date('Y-m-d H:i:s');
			$dataUser['user_level'] = '1';
			$dataUser['user_inativo'] = '0';
			$Create = new Create();
			$Create->ExeCreate("users", $dataUser); // cadastrando usuário no banco de dados
			if($Create->getResult()) { // resultado
				$this->Result = $Create->getResult();
				$this->Error =  "Cadadastro realizado com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}	
	}

	public function createUserSystem($dataUserSystem) {
		if(empty($dataUserSystem["user_name"])) {
			$this->Error = "Preencha no campo o nome do usuário!";
			$this->Result = false;
		} elseif (empty($dataUserSystem["user_email"])) {
			$this->Error = "Preencha o e-mail do usuário!";
			$this->Result = false;
		} elseif (empty($dataUserSystem["user_password"])) {
			$this->Error = "Preencha a senha!";
			$this->Result = false;
		} elseif(empty($dataUserSystem['user_level'])){
			$this->Error = "Escolha o nível do usuário";
			$this->Result = false;
		} elseif ($this->verifyDuplicateUserEmail($dataUserSystem['user_email'])) {
			$this->Result = false;
		} else {
			$dataUserSystem['user_password'] = md5($dataUserSystem['user_password']);
			$dataUserSystem['user_create_date'] = date('Y-m-d H:i:s');
			$dataUserSystem['user_inativo'] = '0';
			$Create = new Create();
			$Create->ExeCreate("users", $dataUserSystem); // cadastrando usuário no banco de dados
			if($Create->getResult()) { // resultado
				$this->Result = $Create->getResult();
				$this->Error =  "Cadadastro realizado com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}	
	}

	public function updateUser($updateUser) {
		$Update = new Update();
		$Update->ExeUpdate("users", $updateUser, "WHERE user_id = :ui", "ui={$updateUser}");
		if ($Update->getResult()) {
			$this->Result = $Update->getResult();
			$this->Error = "O usuário foi atualizado com sucesso!";
		} else {
			$this->Result = false;
			$this->Error = $Update->getError();
		}
	}
	

	private function verifyDuplicateUserEmail($email ) {
		$Read = new Read();
		$Read->FullRead("SELECT user_name FROM users WHERE user_email = :em", "em={$email}");

		if($Read->getResult()) { //get result (dados) é o resultado da busca no banco de dados
			$this->Error = "Este e-mail já está sendo utilizado por outro usuário!";
			// {$Read->getResult()[0]['user_name']}";	
			return true;
		} else {
			return false;
		}
	}
	public function verifyLogon() { 
        if(isset($_SESSION['usuario']) || isset($_SESSION['senha'])) {
        header("Location: " . BASE . "/login");
        exit();
        }
    }
	public function exeLogin($email, $password) {
		if(empty($email)) {
			$this->Error = "O e-mail é obrigatório!";
			$this->Result = false;
		} elseif (empty($password)) {
			$this->Error = "A senha é obrigatória!";
			$this->Result = false;
		} else {
			$password = md5($password);
			$Read = new Read();
			$Read->FullRead("SELECT user_id, user_name, user_email, user_level FROM users WHERE user_email = :em AND user_password = :ps", "em={$email}&ps={$password}");

			if($Read->getResult()) {
				$_SESSION['login'] = $Read->getResult()[0];
				$this->Result = true;
				$this->Error = "Seja bem-vindo(a), {$Read->getResult()[0]['user_name']}";
			} else {
				$this->Error = "Usuário inexistente ou senha inválida!";
				$this->Result = false;
			}	
		} 
	}
	
	public function verifyExistLoginUser() {
		if($this->verifyLoginUserON()) {
			return true;
		} else {
			unset($_SESSION['login']);
			header("Location: " . BASE . "/pages/login");
			return false;
		}
	}

	public function verifyLoginUserON () {
		$Read = new Read();
		if(!empty($_SESSION['login'])) {
			$Read->FullRead("SELECT user_id FROM users WHERE user_id = :id", "id={$_SESSION['login']['user_id']}");
			if($Read->getResult()) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		};
	}
	
	public function logout() {
		session_start();
		session_destroy();
		header('Location: ' . BASE . '/pages/login');
		die();
	}

	//classe de alteração de senha do usuário
	public function resetUserPassword($resetPassword) {
		$this->verifyExistLoginUser();
		if(empty($resetPassword)) {
			$this->Error = 'Digite a senha atual!';
			$this->Result = false;
		} elseif (empty($resetPassword)) {
			$this->Error = "Digite a nova senha!";
			$this->Result = false;
		} elseif(empty($resetPassword)) {
			$this->Error = "Confirme a nova senha!";
			$this->Result = false;
		} elseif($this->verifyExistUserPassword($resetPassword)) {
			$this->Result = false;
		}
		if($resetPassword  === $resetPassword) {
			$this->Error = "Sua senha deve ser diferente!";
			$this->Result = false;
		} else {
			$this->Result = false;
			$this->Error = $resetPassword->getError();
		}
	}

	private function verifyExistUserPassword($pass) {
		$Read = new Read();
		$pass = md5($pass);
		$Read->FullRead('SELECT user_password FROM users WHERE user_password = :pss', "pss={$pass}");
		if($Read->getResult()) {
			$this->Error = "A senha está inválida!";
			$this->Result = false;
		}
	}
	//Método para enviar email de recuperação de senha
	public function getForgotPasswordUser($password) {
		$Read = new Read();
		$Read->FullRead('SELECT user_password FROM users WHERE user_password = :pw', "pw={$password}");
		$password = md5($password);
		if($Read->getResult()) {
			$this->Error = "Não possível alterar a senha de acesso!";
			$this->Result = false;
			// trecho de código que ainda não é utilizado pra nada neste momento
			return true;
		} else {
			return false;
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