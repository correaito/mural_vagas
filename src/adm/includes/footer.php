        </div> <!-- /.container-fluid mt-4 -->
    </div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->

<!-- Scripts -->
<script src="../assets/web/assets/jquery/jquery.min.js"></script>
<script src="../assets/popper/popper.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>


<script>
// Toggle do Menu Lateral
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    
    // Salvar o estado no localStorage
    if ($("#wrapper").hasClass("toggled")) {
        localStorage.setItem('sidebar-toggled', 'true');
    } else {
        localStorage.setItem('sidebar-toggled', 'false');
    }
});

// Função global para excluir vaga na listagem
function excluirvagaon(id) { 
  if(confirm("Tem certeza que deseja excluir esta vaga?")) {
    $.post("deletavaga.php", {id: id}, function(retorno) {
      alert('OK, vaga excluída com sucesso!');
      window.location.reload();
    });    
  }
}
</script>

</body>
</html>
