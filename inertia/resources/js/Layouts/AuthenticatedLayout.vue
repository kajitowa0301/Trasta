<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
                <!-- Primary Navigation Menu -->
                
                            <!-- Logo -->
                

                            <!-- Navigation Links -->
                          

                        
                            <!-- Settings Dropdown -->
                           
                            

                        <!-- Hamburger -->
                        

                <!-- Responsive Navigation Menu -->
                
                    <!-- Responsive Settings Options -->
               

            <!-- Page Heading -->
          

            <!-- Page Content -->
            <main class="  flex justify-center items-center">
                <slot />
            </main>
</template>
