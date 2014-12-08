select jogo.id, nome, distribuidora, genero, idioma from jogo inner join jogo_usuario 
where jogo.id = jogo_usuario.id_jogoFK and jogo_usuario.id_usuarioFK = 13