
<div class="cargo card">
    <div class="card-header">
        <p class="cargo">{cargo}</p>
    </div>
    <div class="card-body">
        <div class="opcoes">
            <table class="table table-borderless table-responsive">
                <thead class="thead-light">
                    <tr>
                        <th>Voto</th>
                        <th>Chapa</th>
                        <th>Titular</th>
                        <th>Suplente</th>
                    </tr>
                </thead>
                <tbody>
                    <form>
                    <tr>
                        <td><input type="radio" id='regular' name="optradio"></td>
                        <td>{chapa}</td>
                        <td>{titular}</td>
                        <td class="suplente">{suplente}</td>
                    </tr>
                    <tr>
                        <td><input type="radio" id='regular' name="optradio"></td>
                        <td colspan="3">Voto Branco</td>
                    </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-primary">Salvar</button>
    </div>
</div>