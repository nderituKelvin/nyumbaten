<template>
    <div>
        <header class="content__title">
            <h1>New Member</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <h3 class="card-body__title">Add New Member</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="">
                            <br>
                            <br>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Phone Number">
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn login__block__btn"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp;&nbsp; Add Member </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "newMember"
    }
</script>

<style scoped>

</style>
