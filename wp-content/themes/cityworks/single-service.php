<?php
/**
 * Single Service Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="container section">
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <!-- Hero del Servicio -->
            <div class="service-hero bg-light" style="padding: 4rem 0; margin-bottom: 4rem;">
                <div class="container">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <span class="badge mb-4" style="background: var(--color-primary); color: white; padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600;">
                                <?php the_title(); ?>
                            </span>
                            <h1 style="font-size: 3.5rem; font-weight: 800; color: #1a1a2e; margin-bottom: 1.5rem; line-height: 1.1;">
                                <?php the_title(); ?>
                            </h1>
                            <p style="font-size: 1.25rem; color: #6b7280; line-height: 1.7;">
                                <?php the_excerpt(); ?>
                            </p>
                            <div class="mt-8">
                                <a href="#contact" class="btn btn-primary btn-lg"><?php _e('Solicitar Este Servicio', 'cityworks'); ?></a>
                            </div>
                        </div>
                        <div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('style' => 'border-radius: 1rem; box-shadow: 0 40px 80px rgba(0,0,0,0.15);')); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido del Servicio -->
            <div class="service-content" style="max-width: 800px; margin: 0 auto;">
                <?php the_content(); ?>
            </div>

            <!-- CTA -->
            <div class="service-cta text-center mt-16 p-8 rounded-2xl" style="background: linear-gradient(135deg, #1a1a2e, #2d2d44); color: white;">
                <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem;">
                    <?php _e('¿Listo para transformar tu negocio?', 'cityworks'); ?>
                </h2>
                <p style="font-size: 1.125rem; color: rgba(255,255,255,0.8); margin-bottom: 2rem;">
                    <?php _e('Nuestro equipo de expertos está listo para ayudarte.', 'cityworks'); ?>
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#contact" class="btn btn-lg" style="background: white; color: #1a1a2e;"><?php _e('Agendar Consulta Gratis', 'cityworks'); ?></a>
                    <a href="tel:1-561-772-3033" class="btn btn-outline-white btn-lg"><?php _e('Llamar Ahora', 'cityworks'); ?></a>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
