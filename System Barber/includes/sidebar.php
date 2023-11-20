<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="sysb_home.php">Home</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Painel ADM</li>
                  <li class="active"><a href="sysb_home.php"><i class="icon mdi mdi-home"></i><span>Home</span></a>
                  </li>

                    <li class="active"><a href="PainelAdminAgenda.php"><i class="icon mdi mdi-calendar"></i><span>Agenda</span></a>
                    </li>

                    <?php
                    if ($_SESSION["tipo_acesso"] == "Administrador"){

                    ?>

                    <li class="parent active"><a href="#"><i class="icon mdi mdi-book"></i><span>Serviços</span></a>
                        <ul class="sub-menu">
                            <li><a href="PainelAdminCadastrarServico.php">Cadastrar Serviço</a>
                            </li>
                            <li><a href="PainelAdminListarTipoExame.php">Visualizar Serviços</a>
                            </li>
                            <li><a href="PainelAdminAcoesTipoExame.php">Editar Serviço</a>
                            </li>
                        </ul>
                    </li>

                    <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION["tipo_acesso"] == "Administrador"){

                    ?>
                  <li class="parent active"><a href="#"><i class="icon mdi mdi-wheelchair-accessibility"></i><span>Usuarios</span></a>
                    <ul class="sub-menu">
                      <li><a href="PainelAdminCadastrarUsuario.php">Adicionar Usuario</a>
                      </li>
                      <li><a href="PainelAdminListarUsuarios.php">Visualizar Usuarios</a>
                      </li>
                      <li><a href="PainelAdminAcoesUsuarios.php">Editar Usuarios</a>
                      </li>
                    </ul>
                  </li>
                    <?php }?>

                    <li class="active"><a href="sair.php"><i class="icon mdi mdi-walk"></i><span>Sair</span></a>
                    </li>

                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>