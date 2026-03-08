import { useEffect, useState, useRef } from "react";
import { motion, useScroll, useTransform, AnimatePresence } from "framer-motion";
import "@fontsource/space-mono/400.css";
import "@fontsource/space-mono/700.css";
import "@fontsource/bebas-neue/400.css";
import "@/App.css";

// GLITCH Images
const GLITCH_BACK = "https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/drhyyz5i_De_espalda.png";
const GLITCH_FRONT = "https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/vp4zid1l_descarga.png";

// Random glitch text effect
const GlitchyText = ({ children, intensity = 1, className = "" }) => {
  const [glitched, setGlitched] = useState(children);
  const chars = "!@#$%^&*()_+-=[]{}|;:,.<>?█▓▒░";
  
  useEffect(() => {
    const interval = setInterval(() => {
      if (Math.random() > 0.85) {
        const text = children.split('');
        const glitchCount = Math.floor(Math.random() * 3 * intensity) + 1;
        for (let i = 0; i < glitchCount; i++) {
          const pos = Math.floor(Math.random() * text.length);
          text[pos] = chars[Math.floor(Math.random() * chars.length)];
        }
        setGlitched(text.join(''));
        setTimeout(() => setGlitched(children), 100);
      }
    }, 150);
    return () => clearInterval(interval);
  }, [children, intensity]);

  return <span className={`glitchy ${className}`}>{glitched}</span>;
};

// Scramble reveal text - quick animation then stays put
const ScrambleText = ({ children, delay = 0 }) => {
  const [text, setText] = useState(children);
  const [hasAnimated, setHasAnimated] = useState(false);
  const ref = useRef(null);
  const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%";

  useEffect(() => {
    const observer = new IntersectionObserver(([entry]) => {
      if (entry.isIntersecting && !hasAnimated) {
        setHasAnimated(true);
        const target = children;
        let iteration = 0;
        
        setTimeout(() => {
          const interval = setInterval(() => {
            setText(
              target.split('').map((char, i) => {
                if (i < iteration) return target[i];
                if (char === ' ') return ' ';
                return chars[Math.floor(Math.random() * chars.length)];
              }).join('')
            );
            iteration += 0.8;
            if (iteration >= target.length) {
              setText(target);
              clearInterval(interval);
            }
          }, 25);
        }, delay * 300);
      }
    }, { threshold: 0.3 });
    
    if (ref.current) observer.observe(ref.current);
    return () => observer.disconnect();
  }, [children, hasAnimated, delay]);

  return <span ref={ref}>{text}</span>;
};

// Cursor follower GLITCH
const GlitchFollower = () => {
  const [pos, setPos] = useState({ x: -100, y: -100 });
  const [visible, setVisible] = useState(false);

  useEffect(() => {
    const handleMove = (e) => {
      setPos({ x: e.clientX, y: e.clientY });
      setVisible(true);
    };
    const handleLeave = () => setVisible(false);
    window.addEventListener('mousemove', handleMove);
    window.addEventListener('mouseleave', handleLeave);
    return () => {
      window.removeEventListener('mousemove', handleMove);
      window.removeEventListener('mouseleave', handleLeave);
    };
  }, []);

  return (
    <div 
      className={`cursor-glitch ${visible ? 'visible' : ''}`}
      style={{ left: pos.x, top: pos.y }}
    >
      <img src={GLITCH_BACK} alt="" />
    </div>
  );
};

// Email form
const EmailForm = ({ variant = "default" }) => {
  const [email, setEmail] = useState("");
  const [gdpr, setGdpr] = useState(false);
  const [submitted, setSubmitted] = useState(false);
  const [error, setError] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    if (email && gdpr) {
      setSubmitted(true);
      setTimeout(() => {
        setSubmitted(false);
        setEmail("");
        setGdpr(false);
      }, 3000);
    } else if (!gdpr) {
      setError(true);
      setTimeout(() => setError(false), 1000);
    }
  };

  return (
    <div className={`form-container ${variant} ${error ? 'shake' : ''}`} data-testid="email-form">
      <form onSubmit={handleSubmit}>
        <div className="form-row">
          <div className="input-wrap">
            <input
              type="email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              placeholder="tu@email.com"
              required
              data-testid="email-input"
            />
            <span className="input-glitch" />
          </div>
          <motion.button
            type="submit"
            whileHover={{ scale: 1.02 }}
            whileTap={{ scale: 0.95 }}
            className={submitted ? 'success' : ''}
            data-testid="submit-btn"
          >
            <span className="btn-text">{submitted ? '[ TRANSMITIDO ]' : '[ RECIBIR SEÑAL ]'}</span>
            <span className="btn-glitch">{submitted ? '[ TRANSMITIDO ]' : '[ RECIBIR SEÑAL ]'}</span>
          </motion.button>
        </div>
        <label className="checkbox-wrap" data-testid="gdpr-label">
          <input
            type="checkbox"
            checked={gdpr}
            onChange={(e) => setGdpr(e.target.checked)}
            data-testid="gdpr-checkbox"
          />
          <span className="checkmark" />
          <span className="checkbox-text">
            He leído la <a href="/privacidad">Política de Privacidad</a>
          </span>
        </label>
      </form>
      <p className="form-note">Sin spam. Sin coaching. Sin bullshit. Cancelas cuando quieras.</p>
    </div>
  );
};

// Distorted section divider
const Distortion = () => (
  <div className="distortion">
    {[...Array(20)].map((_, i) => (
      <div key={i} className="distortion-line" style={{ animationDelay: `${i * 0.05}s` }} />
    ))}
  </div>
);

// Navigation
const Nav = () => {
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => setScrolled(window.scrollY > 100);
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  return (
    <nav className={`nav ${scrolled ? 'scrolled' : ''}`} data-testid="navigation">
      <a href="/" className="nav-logo" data-testid="nav-logo">
        <GlitchyText intensity={2}>INTERIORAR</GlitchyText>
      </a>
      <div className="nav-links">
        <a href="#transmision" data-testid="nav-transmision">[TRANSMISIÓN]</a>
        <a href="#territorios" data-testid="nav-territorios">[TERRITORIOS]</a>
        <motion.a 
          href="#suscribir" 
          className="nav-cta"
          whileHover={{ scale: 1.05 }}
          data-testid="nav-cta"
        >
          SUSCRIBIR_
        </motion.a>
      </div>
    </nav>
  );
};

// Hero Section - Más impactante
const Hero = () => {
  const { scrollYProgress } = useScroll();
  const y = useTransform(scrollYProgress, [0, 0.3], [0, -100]);
  const opacity = useTransform(scrollYProgress, [0, 0.2], [1, 0]);
  const glitchX = useTransform(scrollYProgress, [0, 0.3], [0, 50]);

  return (
    <section className="hero" data-testid="hero-section">
      <div className="hero-bg">
        {[...Array(50)].map((_, i) => (
          <span key={i} className="matrix-char" style={{
            left: `${Math.random() * 100}%`,
            animationDelay: `${Math.random() * 5}s`,
            animationDuration: `${3 + Math.random() * 4}s`
          }}>
            {String.fromCharCode(0x30A0 + Math.random() * 96)}
          </span>
        ))}
      </div>

      <motion.div className="hero-content" style={{ y, opacity }}>
        <span className="hero-tag">
          <span className="blink">&gt;</span> CANAL_DE_ENSAYO_VISUAL_CIENTÍFICO
        </span>
        
        <h1 className="hero-title">
          <span className="title-small">No estás atascado.</span>
          <span className="title-big">
            <ScrambleText>ESTÁS</ScrambleText>
            <br />
            <ScrambleText delay={0.3}>SIENDO</ScrambleText>
            <br />
            <span className="title-accent">
              <ScrambleText delay={0.6}>DISEÑADO.</ScrambleText>
            </span>
          </span>
        </h1>

        <div className="hero-text">
          <p>
            Tu cerebro es una reliquia biológica de hace milenios. Las plataformas que usas para leer esto son laboratorios construidos ayer por ingenieros que cobran seis cifras para <strong>encontrar las grietas de tu evolución y colarse por ellas.</strong>
          </p>
        </div>

        <div className="hero-callout">
          <div className="callout-border" />
          <p>
            Esto no es autoayuda. El narrador es <strong className="highlight">GLITCH</strong>. No le importa si triunfas o si te hundes en la miseria. Solo le importan sus latas de atún.
          </p>
          <p className="callout-accent">
            Y precisamente porque le das igual, es el único en quien puedes confiar.
          </p>
        </div>

        <div className="hero-form" id="transmision">
          <span className="form-label">&gt; INICIAR_TRANSMISION_</span>
          <EmailForm variant="hero" />
        </div>
      </motion.div>

      <motion.div className="hero-glitch" style={{ x: glitchX }}>
        <img src={GLITCH_BACK} alt="GLITCH" className="glitch-img" />
        <div className="glitch-aura" />
      </motion.div>

      <div className="scroll-indicator">
        <span>SCROLL</span>
        <div className="scroll-line" />
      </div>
    </section>
  );
};

// Origin section
const Origin = () => {
  return (
    <section className="origin" data-testid="origin-section">
      <Distortion />
      
      <div className="origin-content">
        <div className="origin-left">
          <span className="section-tag">&gt; QUIEN_ES_GLITCH</span>
          <h2>
            Te presento a <span className="accent">GLITCH</span>,<br />
            el gato que <em>no te quiere.</em>
          </h2>
          
          <div className="origin-text">
            <p>
              No es un gurú. No es un coach. Es un gato callejero digital que un día apareció en mis notas y decidió quedarse. Le llamé GLITCH porque su existencia es un error en el código.
            </p>
            <p>
              <strong>Su única motivación son las latas de atún</strong> que le pago con cada suscriptor. Cuantos más seáis, más come. Y cuanto más come, más verdades incómodas suelta.
            </p>
            <p>
              No le importa si te ofendes. No le importa si abandonas. <strong>No tiene ningún interés emocional en tu éxito.</strong> Y precisamente por eso, es el único que te va a decir lo que necesitas oír.
            </p>
          </div>
        </div>

        <div className="origin-right">
          <div className="glitch-showcase">
            <img src={GLITCH_FRONT} alt="GLITCH" className="showcase-img" />
            <div className="showcase-scanlines" />
            <div className="showcase-noise" />
          </div>
        </div>
      </div>

      <div className="mechanism">
        <span className="section-tag">&gt; COMO_FUNCIONA</span>
        <div className="mechanism-grid">
          {[
            { num: "01", text: "Recibes un email cada semana con un tema específico." },
            { num: "02", text: "El gato (GLITCH) te explica cómo te manipulan usando neurociencia." },
            { num: "03", text: "Al final del email encontrarás la herramienta de defensa correspondiente." },
            { num: "04", text: "Sin humo. Sin promesas. Sin motivación. Solo el manual de usuario de tu cerebro." }
          ].map((item, i) => (
            <div key={i} className="mechanism-item">
              <span className="mechanism-num">{item.num}</span>
              <p dangerouslySetInnerHTML={{ __html: item.text.replace(/cómo te manipulan|herramienta de defensa|manual de usuario/g, '<strong>$&</strong>') }} />
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

// Territories
const Territories = () => {
  const topics = [
    { tag: "DOPAMINA", title: "Scroll Infinito", desc: "Por qué no puedes dejar el móvil (y qué hacer al respecto)." },
    { tag: "CORTISOL", title: "Urgencia Artificial", desc: "Cómo las notificaciones secuestran tu sistema de alerta." },
    { tag: "SEROTONINA", title: "Comparación Social", desc: "El algoritmo que destruye tu autoestima en 3 segundos." },
    { tag: "OXITOCINA", title: "Falsa Conexión", desc: "Likes, corazones y el vacío que dejan." },
    { tag: "GABA", title: "FOMO Engineered", desc: "Miedo a perderte algo que nunca existió." },
    { tag: "ACETILCOLINA", title: "Atención Fragmentada", desc: "Tu capacidad de concentración, vendida al mejor postor." }
  ];

  return (
    <section className="territories" id="territorios" data-testid="territories-section">
      <div className="territories-header">
        <span className="section-tag">&gt; TERRITORIOS_QUE_EXPLORAREMOS</span>
        <h2>
          <ScrambleText>BIBLIOTECA DE MANIPULACIONES</ScrambleText>
        </h2>
        <p>Cada semana atacamos un punto ciego diferente. El sistema tiene muchas puertas traseras a tu cerebro. Las iremos cerrando una a una.</p>
      </div>

      <div className="topics-grid">
        {topics.map((topic, i) => (
          <motion.div 
            key={i} 
            className="topic-card"
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ delay: i * 0.1 }}
            whileHover={{ scale: 1.02, x: 10 }}
          >
            <span className="topic-num">{String(i + 1).padStart(3, '0')}</span>
            <span className="topic-tag">{topic.tag}</span>
            <h3>{topic.title}</h3>
            <p>{topic.desc}</p>
            <div className="topic-glitch" />
          </motion.div>
        ))}
      </div>
    </section>
  );
};

// Why different
const WhyDifferent = () => {
  const cards = [
    {
      title: "NO ES MOTIVACIÓN",
      text: "La motivación es gasolina de bajo octanaje. Se evapora. Aquí hablamos de mecánica: cómo funcionas, por qué fallas, qué palancas tocar.",
      quote: "No necesitas motivación. Necesitas entender el sistema."
    },
    {
      title: "NO ES COACHING",
      text: "Un coach te vende una versión mejorada de ti. GLITCH te enseña los planos del edificio para que dejes de chocar contra las paredes.",
      quote: "Los coaches venden esperanza. Nosotros vendemos esquemas eléctricos."
    },
    {
      title: "NO ES AUTOAYUDA",
      text: "La autoayuda asume que el problema eres tú. Aquí partimos de otra premisa: el problema es que nadie te explicó cómo funciona la máquina.",
      quote: "No estás roto. Estás operando sin manual."
    }
  ];

  return (
    <section className="why-section" data-testid="why-section">
      <Distortion />
      <div className="why-content">
        <span className="section-tag">&gt; POR_QUE_ESTO_ES_DIFERENTE</span>
        
        <div className="why-grid">
          {cards.map((card, i) => (
            <motion.div 
              key={i}
              className="why-card"
              initial={{ opacity: 0, rotateX: -15 }}
              whileInView={{ opacity: 1, rotateX: 0 }}
              transition={{ delay: i * 0.15 }}
            >
              <h3><GlitchyText>{card.title}</GlitchyText></h3>
              <p>{card.text}</p>
              <blockquote>"{card.quote}"</blockquote>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};

// CTA Section
const CTA = () => {
  return (
    <section className="cta-section" data-testid="cta-section">
      <div className="cta-content">
        <span className="section-tag center">&gt; INSTALACIÓN_FINAL</span>
        <h2>
          Ya no puedes decir<br />
          <span className="accent">que no lo sabías.</span>
        </h2>
        <p className="cta-body">
          Una newsletter semanal de neurociencia y comportamiento. Sin coaches. Sin motivación. Sin suavizar. Gratis.
        </p>
        <div className="cta-quote">
          <p>
            "Cada martes que pasas sin entender cómo te manipulan, es un martes que el sistema gana una partida que tú ni siquiera sabías que estabas jugando."
          </p>
          <strong>GLITCH necesita sus latas. Tú necesitas el manual.</strong>
        </div>
      </div>
    </section>
  );
};

// Final section
const Final = () => {
  return (
    <section className="final-section" id="suscribir" data-testid="final-section">
      <div className="final-glitch">
        <img src={GLITCH_BACK} alt="GLITCH" />
        <div className="final-glitch-overlay" />
      </div>
      
      <div className="final-content">
        <h2>
          Última transmisión<br />
          <span className="accent">antes de cerrar.</span>
        </h2>
        <p>
          Si has llegado hasta aquí, algo resonó. Eso significa que tu cerebro ya detectó la señal entre el ruido. Ahora solo queda una decisión: seguir en modo automático, o empezar a leer el código.
        </p>
        <EmailForm variant="final" />
        <span className="signature">— GLITCH & humano asociado</span>
      </div>
    </section>
  );
};

// Footer
const Footer = () => (
  <footer className="footer" data-testid="footer">
    <div className="footer-content">
      <span className="footer-logo"><GlitchyText>INTERIORAR</GlitchyText></span>
      <div className="footer-links">
        <a href="/privacidad">[PRIVACIDAD]</a>
        <a href="/legal">[LEGAL]</a>
        <a href="/contacto">[CONTACTO]</a>
      </div>
      <p>© 2024 INTERIORAR. Un error en el código.</p>
    </div>
  </footer>
);

// Cookie Banner
const CookieBanner = () => {
  const [show, setShow] = useState(false);

  useEffect(() => {
    const accepted = localStorage.getItem('cookies');
    if (!accepted) setTimeout(() => setShow(true), 2500);
  }, []);

  const accept = () => {
    localStorage.setItem('cookies', 'true');
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
            <span className="cookie-icon">🍪</span>
            <div>
              <strong>COOKIES & PRIVACIDAD</strong>
              <p>Usamos cookies para que GLITCH recuerde quién eres. Nada de tracking agresivo.</p>
            </div>
            <div className="cookie-actions">
              <button onClick={() => setShow(false)} className="cookie-btn" data-testid="cookie-config">[CONFIGURAR]</button>
              <button onClick={accept} className="cookie-btn primary" data-testid="cookie-accept">[ACEPTAR]</button>
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
      <div className="noise" />
      <div className="scanlines" />
      <GlitchFollower />
      <Nav />
      <main>
        <Hero />
        <Origin />
        <Territories />
        <WhyDifferent />
        <CTA />
        <Final />
      </main>
      <Footer />
      <CookieBanner />
    </div>
  );
}

export default App;
