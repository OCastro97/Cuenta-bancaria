

    </div>
  </section>
<script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });


  // const tipo_cli = document.querySelector("#tipos");
  // console.log(tipo_cli);
  // tipo_cli.addEventListener("change", () => {
  //   let valorOption =tipo_cli.values;
  //   console.log(valorOption);
  //   var optionSelect =tipo_cli.options[tipo_cli.selectedIndex];
  //   let inputResult = document.querySelector("#cuenta").value = (optionSelect.value);
  // });

  </script>
</body>
</html>