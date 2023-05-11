DELIMITER $$ 
  CREATE PROCEDURE inserirDependente(idResp int, nomeDependente varchar(100), emailDependente varchar(100), cpfDependente varchar(14), telefoneDependente varchar(14))
  BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
        BEGIN
            ROLLBACK;
            RESIGNAL;
        END;

    START TRANSACTION;
       insert into tbpessoas (nome,email, cpf, telefone,idFuncao,idStatus) values (nomeDependente,emailDependente,cpfDependente,telefoneDependente,2,1);
       insert into tbdependentes (idPessoaResponsavel,idPessoaDependente,datahora) values (idResp,LAST_INSERT_ID(),now());
       
    COMMIT WORK;
END $$
DELIMITER ;