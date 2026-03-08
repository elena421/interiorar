import { useEffect, useState, useRef } from "react";
import { motion, useScroll, useTransform, AnimatePresence } from "framer-motion";
import "@fontsource/instrument-serif/400.css";
import "@fontsource/instrument-serif/400-italic.css";
import "@/App.css";

// Custom hook for intersection observer
const useInView = (threshold = 0.1) => {
  const ref = useRef(null);
  const [isInView, setIsInView] = useState(false);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsInView(true);
        }
      },
      { threshold }
    );

    if (ref.current) {
      observer.observe(ref.current);
    }

    return () => observer.disconnect();
  }, [threshold]);

  return [ref, isInView];
};

// Animated text component
const AnimatedText = ({ children, delay = 0, className = "" }) => {
  const [ref, isInView] = useInView();
  
  return (
    <motion.div
      ref={ref}
      initial={{ opacity: 0, y: 30 }}
      animate={isInView ? { opacity: 1, y: 0 } : {}}
      transition={{ duration: 0.8, delay, ease: [0.25, 0.1, 0.25, 1] }}
      className={className}
    >
      {children}
    </motion.div>
  );
};

// Glitch text effect
const GlitchText = ({ children, className = "" }) => {
  const [isHovered, setIsHovered] = useState(false);
  
  return (
    <span 
      className={`glitch-wrapper ${className}`}
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
    >
      <span className={`glitch-text ${isHovered ? 'active' : ''}`} data-text={children}>
        {children}
      </span>
    </span>
  );
};

// Ticker component
const Ticker = () => {
  const items = [
    "un error en el código",
    "neurociencia sin anestesia", 
    "el manual que el sistema no quiere que leas",
    "sin coaches",
    "sin motivación",
    "solo ciencia"
  ];

  return (
    <div className="ticker">
      <div className="ticker-track">
        {[...items, ...items, ...items].map((item, i) => (
          <span key={i}>
            {item}
            <span className="ticker-dot">●</span>
          </span>
        ))}
      </div>
    </div>
  );
};

// Cat image with glitch effect
const GlitchCat = ({ src, className = "", alt = "GLITCH" }) => {
  const [isHovered, setIsHovered] = useState(false);
  
  return (
    <div 
      className={`cat-container ${className}`}
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
    >
      <img 
        src={src} 
        alt={alt}
        className={`cat-image ${isHovered ? 'glitching' : ''}`}
      />
    </div>
  );
};

// Email form component
const EmailForm = ({ dark = false, highlight = false }) => {
  const [email, setEmail] = useState("");
  const [gdpr, setGdpr] = useState(false);
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    if (email && gdpr) {
      setSubmitted(true);
      setTimeout(() => setSubmitted(false), 3000);
      setEmail("");
      setGdpr(false);
    }
  };

  return (
    <div className={`email-form ${dark ? 'dark' : ''} ${highlight ? 'highlight' : ''}`}>
      {highlight && <span className="form-label">// RECIBIR TRANSMISION</span>}
      <form onSubmit={handleSubmit}>
        <div className="input-group">
          <input
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            placeholder="tu@email.com"
            required
            data-testid="email-input"
          />
          <motion.button
            type="submit"
            whileHover={{ scale: 1.02 }}
            whileTap={{ scale: 0.98 }}
            data-testid="submit-btn"
          >
            {submitted ? "Enviado ✓" : "Recibir →"}
          </motion.button>
        </div>
        <label className="gdpr-checkbox">
          <input
            type="checkbox"
            checked={gdpr}
            onChange={(e) => setGdpr(e.target.checked)}
            required
            data-testid="gdpr-checkbox"
          />
          <span>He leído la <a href="/privacidad" target="_blank" rel="noopener noreferrer">Política de Privacidad</a>.</span>
        </label>
      </form>
      <p className="form-note">Sin spam. Cancelas cuando quieras.</p>
    </div>
  );
};

// Navigation
const Navigation = () => {
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 50);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  return (
    <motion.nav 
      className={`nav ${scrolled ? 'scrolled' : ''}`}
      initial={{ y: -100 }}
      animate={{ y: 0 }}
      transition={{ duration: 0.6, ease: [0.25, 0.1, 0.25, 1] }}
      data-testid="navigation"
    >
      <div className="nav-inner">
        <a href="/" className="nav-logo" data-testid="nav-logo">
          <GlitchText>Interiorar</GlitchText>
        </a>
        <div className="nav-links">
          <a href="#territorios" data-testid="nav-temas">Temas</a>
          <a href="#newsletter" data-testid="nav-newsletter">Newsletter</a>
          <motion.a 
            href="#newsletter" 
            className="nav-cta"
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            data-testid="nav-suscribirse"
          >
            Suscribirse
          </motion.a>
        </div>
      </div>
    </motion.nav>
  );
};

// Hero Section
const Hero = () => {
  const { scrollY } = useScroll();
  const y = useTransform(scrollY, [0, 500], [0, 150]);
  const opacity = useTransform(scrollY, [0, 300], [1, 0]);

  const catUrl = "https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=600&h=800&fit=crop&auto=format";

  return (
    <section className="hero" data-testid="hero-section">
      <div className="hero-content">
        <AnimatedText delay={0.2}>
          <span className="eyebrow">
            <span className="eyebrow-line"></span>
            canal de ensayo visual científico
          </span>
        </AnimatedText>
        
        <AnimatedText delay={0.4}>
          <h1 className="hero-title">
            <span className="hero-small">No estás atascado.</span>
            <span className="hero-big">
              Estás siendo
              <br />
              <GlitchText>diseñado.</GlitchText>
            </span>
          </h1>
        </AnimatedText>

        <AnimatedText delay={0.6}>
          <p className="hero-text">
            Tu cerebro es una reliquia biológica de hace milenios. Las plataformas que usas para leer esto son laboratorios construidos ayer por ingenieros que cobran seis cifras para <strong>encontrar las grietas de tu evolución y colarse por ellas.</strong>
          </p>
        </AnimatedText>

        <AnimatedText delay={0.8}>
          <div className="callout">
            <p>
              Esto no es autoayuda. El narrador es <strong>GLITCH</strong>. No le importa si triunfas o si te hundes en la miseria. Solo le importan sus latas de atún.
              <br /><br />
              <strong>Y precisamente porque le das igual, es el único en quien puedes confiar.</strong>
            </p>
          </div>
        </AnimatedText>

        <AnimatedText delay={1}>
          <div className="form-intro">
            <span className="pulse-dot"></span>
            <span>Transmisión semanal — gratis</span>
          </div>
          <EmailForm dark />
        </AnimatedText>
      </div>

      <motion.div className="hero-visual" style={{ y, opacity }}>
        <GlitchCat src={catUrl} className="hero-cat" />
      </motion.div>
    </section>
  );
};

// Origin Section
const Origin = () => {
  const catUrl = "https://images.unsplash.com/photo-1573865526739-10659fec78a5?w=500&h=600&fit=crop&auto=format";

  const steps = [
    { text: "Recibes un email cada semana con un tema específico." },
    { text: "El gato (GLITCH) te explica <strong>cómo te manipulan</strong> usando neurociencia." },
    { text: "Al final del email encontrarás <strong>la herramienta de defensa</strong> correspondiente." },
    { text: "Sin humo. Sin promesas. Sin motivación. <strong>Solo el manual de usuario de tu cerebro.</strong>" }
  ];

  return (
    <section className="origin" data-testid="origin-section">
      <div className="origin-inner">
        <div className="origin-left">
          <GlitchCat src={catUrl} className="origin-cat" />
          <div className="mechanism">
            <span className="mechanism-label">// cómo funciona</span>
            <ol>
              {steps.map((step, i) => (
                <AnimatedText key={i} delay={i * 0.1}>
                  <li>
                    <span className="step-num">{String(i + 1).padStart(2, '0')}</span>
                    <p dangerouslySetInnerHTML={{ __html: step.text }} />
                  </li>
                </AnimatedText>
              ))}
            </ol>
          </div>
        </div>

        <div className="origin-right">
          <AnimatedText>
            <span className="eyebrow">
              <span className="eyebrow-line"></span>
              el bicho que te cuenta la verdad
            </span>
          </AnimatedText>
          
          <AnimatedText delay={0.2}>
            <h2>
              Te presento a <em>GLITCH</em>,<br />
              el gato que <em>no te quiere.</em>
            </h2>
          </AnimatedText>

          <AnimatedText delay={0.4}>
            <p>
              No es un gurú. No es un coach. Es un gato callejero digital que un día apareció en mis notas y decidió quedarse. Le llamé GLITCH porque su existencia es un error en el código.
            </p>
          </AnimatedText>

          <AnimatedText delay={0.6}>
            <p>
              <strong>Su única motivación son las latas de atún</strong> que le pago con cada suscriptor. Cuantos más seáis, más come. Y cuanto más come, más verdades incómodas suelta.
            </p>
          </AnimatedText>

          <AnimatedText delay={0.8}>
            <p>
              No le importa si te ofendes. No le importa si abandonas. <strong>No tiene ningún interés emocional en tu éxito.</strong> Y precisamente por eso, es el único que te va a decir lo que necesitas oír.
            </p>
          </AnimatedText>
        </div>
      </div>
    </section>
  );
};

// Territories Section
const Territories = () => {
  const topics = [
    { tag: "dopamina", color: "gold", title: "Scroll Infinito", desc: "Por qué no puedes dejar el móvil (y qué hacer al respecto)." },
    { tag: "cortisol", color: "orange", title: "Urgencia Artificial", desc: "Cómo las notificaciones secuestran tu sistema de alerta." },
    { tag: "serotonina", color: "blue", title: "Comparación Social", desc: "El algoritmo que destruye tu autoestima en 3 segundos." },
    { tag: "oxitocina", color: "purple", title: "Falsa Conexión", desc: "Likes, corazones y el vacío que dejan." },
    { tag: "gaba", color: "white", title: "FOMO Engineered", desc: "Miedo a perderte algo que nunca existió." },
    { tag: "acetilcolina", color: "green", title: "Atención Fragmentada", desc: "Tu capacidad de concentración, vendida al mejor postor." }
  ];

  return (
    <section className="territories" id="territorios" data-testid="territories-section">
      <div className="territories-inner">
        <div className="territories-header">
          <div>
            <AnimatedText>
              <h2>Territorios que exploraremos</h2>
            </AnimatedText>
            <AnimatedText delay={0.2}>
              <span className="territories-sub">// biblioteca de manipulaciones</span>
            </AnimatedText>
          </div>
          <AnimatedText delay={0.4}>
            <p className="territories-desc">
              Cada semana atacamos un punto ciego diferente. El sistema tiene muchas puertas traseras a tu cerebro. Las iremos cerrando una a una.
            </p>
          </AnimatedText>
        </div>

        <div className="topics-table">
          <div className="table-header">
            <span>Neurotransmisor</span>
            <span>Tema</span>
            <span>Núm.</span>
          </div>
          {topics.map((topic, i) => (
            <AnimatedText key={i} delay={i * 0.1}>
              <div className="table-row">
                <span className={`topic-tag ${topic.color}`}>{topic.tag}</span>
                <div className="topic-content">
                  <h3>{topic.title}</h3>
                  <p>{topic.desc}</p>
                </div>
                <span className="topic-num">{String(i + 1).padStart(3, '0')}</span>
              </div>
            </AnimatedText>
          ))}
        </div>
      </div>
    </section>
  );
};

// Why Section
const WhySection = () => {
  const catUrl = "https://images.unsplash.com/photo-1495360010541-f48722b34f7d?w=300&h=400&fit=crop&auto=format";

  const cards = [
    {
      num: "01",
      title: "No es motivación",
      text: "La motivación es gasolina de bajo octanaje. Se evapora. Aquí hablamos de mecánica: cómo funcionas, por qué fallas, qué palancas tocar.",
      quote: "\"No necesitas motivación. Necesitas entender el sistema.\""
    },
    {
      num: "02",
      title: "No es coaching",
      text: "Un coach te vende una versión mejorada de ti. GLITCH te enseña los planos del edificio para que dejes de chocar contra las paredes.",
      quote: "\"Los coaches venden esperanza. Nosotros vendemos esquemas eléctricos.\""
    },
    {
      num: "03",
      title: "No es autoayuda",
      text: "La autoayuda asume que el problema eres tú. Aquí partimos de otra premisa: el problema es que nadie te explicó cómo funciona la máquina.",
      quote: "\"No estás roto. Estás operando sin manual.\""
    }
  ];

  return (
    <section className="why-section" data-testid="why-section">
      <div className="why-inner">
        <AnimatedText>
          <h2>Por qué esto es <span>diferente</span></h2>
        </AnimatedText>

        <div className="why-content">
          <GlitchCat src={catUrl} className="why-cat" />
          
          <div className="why-cards">
            {cards.map((card, i) => (
              <AnimatedText key={i} delay={i * 0.15}>
                <div className="why-card">
                  <span className="card-num">{card.num}</span>
                  <h3>{card.title}</h3>
                  <p>{card.text}</p>
                  <blockquote>{card.quote}</blockquote>
                </div>
              </AnimatedText>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
};

// CTA Section
const CTASection = () => {
  return (
    <section className="cta-section" data-testid="cta-section">
      <div className="cta-inner">
        <AnimatedText>
          <span className="eyebrow center">
            // instalación
            <span className="eyebrow-line"></span>
          </span>
        </AnimatedText>

        <AnimatedText delay={0.2}>
          <h2>
            Ya no puedes decir
            <br />
            <em>que no lo sabías.</em>
          </h2>
        </AnimatedText>

        <AnimatedText delay={0.4}>
          <p className="cta-body">
            Una newsletter semanal de neurociencia y comportamiento. Sin coaches. Sin motivación. Sin suavizar. Gratis.
          </p>
        </AnimatedText>

        <AnimatedText delay={0.6}>
          <p className="cta-urgency">
            "Cada martes que pasas sin entender cómo te manipulan, es un martes que el sistema gana una partida que tú ni siquiera sabías que estabas jugando."
            <strong>GLITCH necesita sus latas. Tú necesitas el manual.</strong>
          </p>
        </AnimatedText>
      </div>
    </section>
  );
};

// Final Section with form
const FinalSection = () => {
  const catUrl = "https://images.unsplash.com/photo-1526336024174-e58f5cdd8e13?w=600&h=700&fit=crop&auto=format";

  return (
    <section className="final-section" id="newsletter" data-testid="final-section">
      <div className="final-inner">
        <div className="final-visual">
          <GlitchCat src={catUrl} className="final-cat" />
        </div>

        <div className="final-content">
          <AnimatedText>
            <h2>
              Última transmisión
              <br />
              <em>antes de cerrar.</em>
            </h2>
          </AnimatedText>

          <AnimatedText delay={0.2}>
            <p>
              Si has llegado hasta aquí, algo resonó. Eso significa que tu cerebro ya detectó la señal entre el ruido. Ahora solo queda una decisión: seguir en modo automático, o empezar a leer el código.
            </p>
          </AnimatedText>

          <AnimatedText delay={0.4}>
            <EmailForm highlight />
          </AnimatedText>

          <AnimatedText delay={0.6}>
            <span className="signature">— GLITCH & humano asociado</span>
          </AnimatedText>
        </div>
      </div>
    </section>
  );
};

// Footer
const Footer = () => {
  return (
    <footer className="footer" data-testid="footer">
      <div className="footer-inner">
        <a href="/" className="footer-logo">Interiorar</a>
        <div className="footer-links">
          <a href="/privacidad">Privacidad</a>
          <a href="/legal">Legal</a>
          <a href="/contacto">Contacto</a>
        </div>
        <p>© 2024 Interiorar. Todos los derechos reservados.</p>
      </div>
    </footer>
  );
};

// Cookie Banner
const CookieBanner = () => {
  const [show, setShow] = useState(false);

  useEffect(() => {
    const accepted = localStorage.getItem('cookies-accepted');
    if (!accepted) {
      setTimeout(() => setShow(true), 2000);
    }
  }, []);

  const handleAccept = () => {
    localStorage.setItem('cookies-accepted', 'true');
    setShow(false);
  };

  return (
    <AnimatePresence>
      {show && (
        <motion.div 
          className="cookie-banner"
          initial={{ y: 100, opacity: 0 }}
          animate={{ y: 0, opacity: 1 }}
          exit={{ y: 100, opacity: 0 }}
          data-testid="cookie-banner"
        >
          <div className="cookie-content">
            <h3>Cookies <span>&</span> Privacidad</h3>
            <p>
              Usamos cookies para que GLITCH recuerde quién eres (y para analytics básicos). 
              Nada de tracking agresivo.
            </p>
            <div className="cookie-actions">
              <button onClick={() => setShow(false)} className="cookie-btn secondary" data-testid="cookie-config">
                Configurar
              </button>
              <button onClick={handleAccept} className="cookie-btn primary" data-testid="cookie-accept">
                Aceptar
              </button>
            </div>
          </div>
        </motion.div>
      )}
    </AnimatePresence>
  );
};

// Main App
function App() {
  return (
    <div className="app" data-testid="app">
      <div className="scanline"></div>
      <Navigation />
      <Ticker />
      <main>
        <Hero />
        <Origin />
        <Territories />
        <WhySection />
        <CTASection />
        <FinalSection />
      </main>
      <Footer />
      <CookieBanner />
    </div>
  );
}

export default App;
